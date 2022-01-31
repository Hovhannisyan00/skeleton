<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileService
 * @package App\Services\File
 */
class FileService extends BaseService
{
    /**
     * FileService constructor.
     *
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Function to store file
     *
     * @param Model $model
     * @param array $data
     */
    public function storeFile(Model $model, array $data)
    {
        $config = $this->getConfig($model);

        foreach ($config as $fieldName => $fieldValue) {
            $files = $data[$fieldName] ?? [];

            $configAttributes = [
                'field_name' => $fieldName,
                'file_type' => $fieldValue['file_type']
            ];

            if (is_array($files)) {
                foreach ($files as $fileName) {
                    $this->create($model, $configAttributes, $fileName, true);
                }
            } else {
                $this->create($model, $configAttributes, $files);
            }
        }
    }

    /**
     * Function to create file
     *
     * @param Model $model
     * @param array $configAttributes
     * @param $fileName
     * @param bool $isArray
     */
    private function create(Model $model, array $configAttributes, $fileName, bool $isArray = false)
    {
        $fieldName = $configAttributes['field_name'];
        $fileType = $configAttributes['file_type'];

        $dir_prefix = strtolower(class_basename($model));
        $path = $dir_prefix . '/' . $fieldName;
        $fileBaseName = explode('/', $fileName)[1] ?? null;

        if ($fileBaseName) {
            if (!$isArray) {
                $this->deleteModelFile($model, $fieldName);
            }

            $move = $this->movePendingFileToUploadsFolder($fileBaseName, [
                'pending' => $fileName,
                'uploads' => $path
            ]);

            if ($move) {
                $model->files($fieldName)->create([
                    'field_name' => $fieldName,
                    'file_name' => $fileBaseName,
                    'file_type' => $fileType,
                    'dir_prefix' => $dir_prefix
                ]);
            }
        }
    }

    /**
     * Function to delete Model files
     *
     * @param $model
     * @param null $fieldName
     * @return void
     */
    public function deleteModelFile($model, $fieldName = null): void
    {
        $files = $model->files($fieldName)->get();
        if (count($files)) {
            foreach ($files as $file) {
                $this->deleteFilePhysically($file);
            }
            $model->files($fieldName)->delete();
        }
    }

    /**
     * Function to delete file
     *
     * @param int $id
     */
    public function deleteFile(int $id)
    {
        $file = $this->repository->find($id);
        $this->deleteFilePhysically($file);
        $this->repository->destroy($id);
    }

    /**
     * Function to delete file physically
     *
     * @param $file
     */
    private function deleteFilePhysically($file)
    {
        Storage::disk('uploads')->delete($file->dir_prefix . '/' . $file->field_name . '/' . $file->file_name);
    }

    /**
     * Function to move tmp file from pending dir to upload dir
     *
     * @param $fileName
     * @param null $customDirectory
     * @return bool
     */
    private function movePendingFileToUploadsFolder($fileName, $customDirectory = null): bool
    {
        if (Storage::disk('pending')->exists($customDirectory['pending'])) {
            // convert to full paths
            $fullPathPending = Storage::disk('pending')->getDriver()->getAdapter()->applyPathPrefix($customDirectory['pending']);

            $filePath = isset($customDirectory['uploads']) ? '/' . $customDirectory['uploads'] . '/' . $fileName : $fileName;

            $fullPathUploads = Storage::disk('uploads')->getDriver()->getAdapter()->applyPathPrefix($filePath);

            // make destination folder
            if (!File::exists(dirname($fullPathUploads))) {
                File::makeDirectory(dirname($fullPathUploads), 0755, true);
            }

            return File::move($fullPathPending, $fullPathUploads);
        }

        return false;
    }

    /**
     * Function to move files from pending to uploads
     *
     * @param $fileName
     * @param null $customDirectory
     * @return string
     */
    public function moveToUploadsFolder($fileName, $customDirectory = null): string
    {
        $fileBaseName = explode('/', $fileName)[1] ?? null;

        $this->movePendingFileToUploadsFolder($fileBaseName, [
            'pending' => $fileName,
            'uploads' => $customDirectory
        ]);

        return $fileBaseName;
    }

    /**
     * Function to store file
     *
     * @param $data
     * @return array
     */
    public function storeTempFile($data): array
    {
        $disk = Storage::disk('pending');
        $file = $data['file'];
        $config = config("files.{$data['config_key']}");
        $originalName = $file->getClientOriginalName();
        $filename = basename($originalName, '.' . pathinfo($originalName, PATHINFO_EXTENSION));
        $filename = uniqid() . '_' . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename) . '.' . $file->getClientOriginalExtension();
        $path = now()->format('d-m-Y');

        $disk->putFileAs($path, $file, $filename);

        return [
            'status' => 'OK',
            'file_url' => $disk->url($path . '/' . $filename),
            'name' => $path . '/' . $filename,
            'original_name' => $file->getClientOriginalName(),
            'file_type' => $config['file_type'],
        ];
    }

    /**
     * Function to remove last days temp files
     */
    public static function removeTempFiles()
    {
        $disk = Storage::disk('pending');
        $pastDay = now()->subDay();
        $directories = $disk->allDirectories();

        foreach ($directories as $directory) {
            $directoryDate = Carbon::parse($directory);
            if (!$pastDay->lt($directoryDate)) {
                $disk->deleteDirectory($directory);
            }
        }
    }

    /**
     * Function to get model config file
     *
     * @param $model
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     * @throws \Exception
     */
    private function getConfig($model): array
    {
        if (!$model::hasFilesData()) {
            throw new \Exception('In Model Please use HasFilesData trait');
        }

        return config('files.'.$model->getFileConfigName());
    }
}
