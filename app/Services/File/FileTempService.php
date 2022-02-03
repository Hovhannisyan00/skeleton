<?php

namespace App\Services\File;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileTempService
 * @package App\Services\File
 */
class FileTempService extends FileService
{
    /**
     * Function to store file
     *
     * @param Model $model
     * @param array $data
     */
    public function storeFile(Model $model, array $data)
    {
        $config = $model->getFileConfig();

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

        $filename = $this->getFileName($file);
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
     *
     * @return void
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
}
