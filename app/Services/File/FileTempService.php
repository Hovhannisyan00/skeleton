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
     * @return void
     */
    public function storeFile(Model $model, array $data): void
    {
        foreach ($model->getFileConfig() as $fieldName => $config) {

            $files = $data[$fieldName] ?? [];
            $files = is_array($files) ? $files : [$files];

            foreach ($files as $fileName) {
                $this->create($model, $config, $fileName);
            }
        }
    }

    /**
     * Function to create file
     *
     * @param Model $model
     * @param array $config
     * @param $fileName
     * @return void
     */
    private function create(Model $model, array $config, $fileName): void
    {
        $fieldName = $config['field_name'];
        $fileType = $config['file_type'];

        $dirPrefix = $model::getClassName();
        $path = $dirPrefix . '/' . $fieldName;
        $fileBaseName = explode('/', $fileName)[1] ?? null;

        // temp file move upload
        if ($fileBaseName) {

            $this->deleteModelFile($model, $config['field_name']);

            $move = $this->movePendingFileToUploadsFolder(fileName: $fileBaseName, config: $config, directoryData: [
                'pending' => $fileName,
                'uploads' => $path,
            ]);

            if ($move) {
                $model->files($fieldName)->create([
                    'field_name' => $fieldName,
                    'file_name' => $fileBaseName,
                    'file_type' => $fileType,
                    'dir_prefix' => $dirPrefix
                ]);
            }
        }
    }

    /**
     * Function to store file
     *
     * @param array $data
     * @return array
     */
    public function storeTempFile(array $data): array
    {
        $file = $data['file'];
        $config = config("files.{$data['config_key']}");

        $filename = $this->getFileName($file);
        $path = now()->format('d-m-Y');

        $this->pendingDisk->putFileAs(path: $path, file: $file, name: $filename);

        return [
            'status' => 'OK',
            'file_url' => $this->pendingDisk->url($path . '/' . $filename),
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
    public static function removeTempFiles(): void
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
     * @param string $fileName
     * @param string $customDirectory
     * @param array $config
     * @return string
     */
    public function moveToUploadsFolder(string $fileName, string $customDirectory = '', array $config = []): string
    {
        $fileBaseName = explode('/', $fileName)[1] ?? null;

        $this->movePendingFileToUploadsFolder(fileName: $fileBaseName, config: $config, directoryData: [
            'pending' => $fileName,
            'uploads' => $customDirectory
        ]);

        return $fileBaseName;
    }
}
