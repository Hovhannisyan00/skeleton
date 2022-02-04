<?php

namespace App\Services\File;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FileUploadedService
 * @package App\Services\File
 */
class FileUploadedService extends FileService
{
    /**
     * Function to store upload file
     *
     * @param Model $model
     * @param string|array $files
     * @param string $configName
     * @return void
     */
    public function storeFile(Model $model, $files, string $configName): void
    {
        $config = $model->getFileConfig()[$configName];
        $this->deleteModelFile($model, $config['field_name']);

        $files = is_array($files) ? $files : [$files];

        foreach ($files as $file) {
            $this->create($model, $file, $config);
        }
    }

    /**
     * Function to put file to folder and save to db
     *
     * @param Model $model
     * @param $file
     * @param $config
     * @return void
     */
    private function create(Model $model, $file, $config): void
    {
        $fieldName = $config['field_name'];
        $fileType = $config['file_type'];
        $fileName = $this->getFileName($file);

        $savedFile = $this->uploadsDisk->putFileAs($model::getClassName(), $file, $fieldName . '/' . $fileName);

        if (isset($config['thumb'])) {
            $this->saveThumb($fileName, $this->getFilePathUploadsDisk($savedFile), $config['thumb'], [
                'uploads' => $model::getClassName() . '/' . $fieldName
            ]);
        }

        $model->files($fieldName)->create([
            'field_name' => $fieldName,
            'file_name' => $fileName,
            'file_type' => $fileType,
            'dir_prefix' => $model::getClassName()
        ]);
    }
}
