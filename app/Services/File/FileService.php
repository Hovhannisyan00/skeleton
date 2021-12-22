<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
     * @param array $config
     */
    public function storeFile(Model $model, array $data, array $config)
    {
        foreach ($config as $fieldName => $fieldValue) {
            $files = $data[$fieldName] ?? [];

            $configAttributes = [
                'field_name' => $fieldName,
                'file_type' => $fieldValue['file_type']
            ];

            if (is_array($files)) {
                foreach ($files as $file) {
                    $this->create($model, $configAttributes, $file);
                }
            } else {
                $this->deleteModelFile($model, $fieldName);
                $this->create($model, $configAttributes, $files);
            }
        }
    }

    /**
     * Function to create file
     *
     * @param Model $model
     * @param array $configAttributes
     * @param $file
     */
    public function create(Model $model, array $configAttributes, $file)
    {
        $fieldName = $configAttributes['field_name'];
        $fileType = $configAttributes['file_type'];

        $dir_prefix = strtolower(class_basename($model));
        $path = $dir_prefix . '/' . $fieldName;
        $fileName = uniqid() . '_' . Str::slug($file->getClientOriginalName(), '.');

        Storage::disk('uploads')->putFileAs($path, $file, $fileName);

        $model->files($fieldName)->create([
            'field_name' => $fieldName,
            'file_name' => $fileName,
            'file_type' => $fileType,
            'dir_prefix' => $dir_prefix
        ]);
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
    public function delete(int $id)
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
}
