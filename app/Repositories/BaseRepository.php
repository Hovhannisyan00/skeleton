<?php

namespace App\Repositories;

use App\Contracts\IBaseRepository;
use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Interface BaseRepository
 * @package App\Repositories
 */
class BaseRepository implements IBaseRepository
{
    /**
     * @var Model
     */
    public $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getInstance(): Model
    {
        return new $this->model();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        if ($this->model->defaultValues) {
            $data = array_merge($this->model->defaultValues, $data);
        }

        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        return $this->model->insert($data);
    }

    /**
     * @param int $id
     * @param array $with
     * @param bool $throw
     * @return Builder|Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find(int $id, array $with = [], bool $throw = true): Model
    {
        $model = empty($with) ? $this->model : $this->model::with($with);

        return $throw ? $model->findOrFail($id) : $model->find($id);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param string $id
     * @return Model
     */
    public function findOrFailUUID(string $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param string $uuid
     * @return Model
     */
    public function firstOrFailByUUID(string $uuid): Model
    {
        return $this->model->where(['uuid' => $uuid])->firstOrFail();
    }

    /**
     * @param string $token
     * @return Model
     */
    public function firstOrFailByToken(string $token): Model
    {
        return $this->model->where(['token' => $token])->firstOrFail();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array|null $columns
     * @return Collection
     */
    public function get(array $columns = null): Collection
    {
        return $this->model->get($columns);
    }

    /**
     * @param array $whereIn
     * @return Collection
     */
    public function getWhereIn(array $whereIn): Collection
    {
        return $this->model->whereIn('id', $whereIn)->get();
    }

    /**
     * Function to return get for select
     *
     * @param string $column
     * @param string $key
     * @return Collection
     */
    public function getForSelect(string $column = 'name', string $key = 'id'): Collection
    {
        return $this->model->pluck($column, $key);
    }

    /**
     * Function to return get for select by join Ml
     *
     * @param string $column
     * @param string $key
     * @return Collection
     */
    public function getForSelectMl(string $column = 'name', string $key = 'id'): Collection
    {
        return $this->model->joinML()->pluck($column, $key);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        $model = $this->find($id);
        if ($model->defaultValues) {
            $data = array_merge($model->defaultValues, $data);
        }

        $model->update($data);
        return $model->refresh();
    }

    /**
     * @param array $whereData
     * @param array $data
     * @return Model
     */
    public function updateOrCreate(array $whereData, array $data): Model
    {
        return $this->model->updateOrCreate($whereData, $data);
    }

    /**
     * @param array $ids
     * @param array $data
     * @return bool
     */
    public function updateIn(array $ids, array $data): bool
    {
        return $this->model->whereIn('id', $ids)->update($data);
    }

    /**
     * @param array $whereData
     * @param array $data
     * @return bool
     */
    public function updateWhere(array $whereData, array $data): bool
    {
        return $this->model->where($whereData)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $this->model->findOrFail($id);

        return $this->model->destroy($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function softDelete(int $id): bool
    {
        $currentModel = $this->model->findOrFail($id);

        if (method_exists($currentModel, 'canDelete') && !$currentModel->canDelete()) {
            return false;
        }

        $updateData = [
            'show_status' => BaseModel::SHOW_STATUS_DELETED,
        ];

        if ($this->model->hasUserInfo) {
            $updateData = $updateData + ['deleted_user_id' => Auth::id(), 'deleted_user_ip' => request()->ip()];
        }

        return $this->model->where('id', $id)->update($updateData);
    }

    /**
     * @param Model $model
     * @param array $mlsData
     */
    public function saveMl(Model $model, array $mlsData): void
    {
        foreach ($mlsData as $lngCode => $mlData) {
            $model->mls()->updateOrCreate(
                [
                    $this->model->getForeignKey() => $model->id,
                    'lng_code' => $lngCode
                ],
                $mlData
            );
        }
    }

}
