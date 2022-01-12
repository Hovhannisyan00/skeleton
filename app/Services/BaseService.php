<?php

namespace App\Services;

use App\Services\File\FileService;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    /**
     * @var @any
     */
    protected $repository;

    /**
     * @var FileService
     */
    protected $fileService;

    /**
     * Function to create or update model
     *
     * @param $data
     * @param int|null $id
     */
    public function createOrUpdate($data, int $id = null)
    {
        DB::transaction(function () use ($id, $data) {
            $model = $id ? $this->repository->update($id, $data) : $this->repository->create($data);

            // Ml
            if (isset($data['ml'])) {
                $this->repository->saveMl($model, $data['ml']);
            }

            // Files
            if ($model::hasFilesData()) {
                $this->fileService()->storeFile($model, $data);
            }
        });
    }

    /**
     * Function to return view data
     *
     * @param int|null $id
     * @return array
     */
    public function getViewData(int $id = null): array
    {
        // Add Mode
        if ($id === null) {
            $model = $this->repository->getInstance();
            return [
                $model::getClassName() => $this->repository->getInstance()
            ];
        }

        // Edit Mode
        $model = $this->repository->find($id);
        $variableKey = $model::getClassName();

        $data = [
            $variableKey => $model
        ];

        if ($model->mls) {
            $data["{$variableKey}Ml"] = $model->mls->keyBy('lng_code');
        }

        return $data;
    }

    /**
     * Function to delete model
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $model = $this->repository->find($id);
        if ($model::hasFilesData()) {
            $this->fileService()->deleteModelFile($model);
        }

        $this->repository->destroy($id);
    }

    /**
     * Function to get FileService class
     *
     * @return FileService
     */
    private function fileService()
    {
        return app()->make(FileService::class);
    }
}
