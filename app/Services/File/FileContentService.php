<?php

namespace App\Services\File;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileContentService
 * @package App\Services\File
 */
class FileContentService extends FileService
{
    /**
     * Function to store upload file
     *
     * @param Model $model
     * @param $files
     * @param string $configName
     */
    public function storeUploadedFile(Model $model, $files, string $configName)
    {
        $config = $model->getFileConfig()[$configName];
        $this->deleteModelFile($model, $config['field_name']);

        if (is_array($files)) {
            foreach ($files as $fileName) {
                $this->create($model, $fileName, $config);
            }
        } else {
            $this->create($model, $files, $config);
        }
    }

    /**
     * Function to put file to folder and save to db
     *
     * @param Model $model
     * @param $file
     * @param $config
     */
    private function create(Model $model, $file, $config)
    {
        $fieldName = $config['field_name'];
        $fileType = $config['file_type'];
        $filename = $this->getFileName($file);

        Storage::disk('uploads')->putFileAs(strtolower(class_basename($model)), $file, $fieldName . '/' . $filename);

        $model->files($fieldName)->create([
            'field_name' => $fieldName,
            'file_name' => $filename,
            'file_type' => $fileType,
            'dir_prefix' => strtolower(class_basename($model))
        ]);
    }
}
