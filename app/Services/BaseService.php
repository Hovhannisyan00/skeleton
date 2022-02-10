<?php

namespace App\Services;

use App\Contracts\IBaseRepository;
use App\Services\File\FileService;
use App\Services\File\FileTempService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    /**
     * @var IBaseRepository
     */
    protected IBaseRepository $repository;

    /**
     * @var FileService
     */
    protected FileService $fileService;

    /**
     * Function to create or update model
     *
     * @param $data
     * @param int|null $id
     * @return Model
     */
    public function createOrUpdate($data, int $id = null): Model
    {
        return DB::transaction(function () use ($id, $data) {
            $model = $id ? $this->repository->update($id, $data) : $this->repository->create($data);

            // Ml
            if (isset($data['ml'])) {
                $this->repository->saveMl($model, $data['ml']);
            }

            // Files
            if ($model->hasFilesData()) {
                $this->fileService()->storeFile($model, $data);
            }

            return $model;
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
        if ($model->hasFilesData()) {
            $this->fileService()->deleteModelFile($model);
        }

        if ($model->hasShowStatus()) {
            $this->repository->softDelete($id);
        } else {
            $this->repository->destroy($id);
        }
    }

    /**
     * Function to get FileService class
     *
     * @return FileTempService
     */
    private function fileService()
    {
        return app()->make(FileTempService::class);
    }
}
