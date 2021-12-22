<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface IBaseRepository
 * @package App\Contracts
 */
interface IBaseRepository
{
    /**
     * @return Model
     */
    public function getInstance(): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array|null $columns
     * @return Collection
     */
    public function get(array $columns = null): Collection;

    /**
     * @param array $whereIn
     * @return Collection
     */
    public function getWhereIn(array $whereIn): Collection;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * @param array $whereData
     * @param array $data
     * @return Model
     */
    public function updateOrCreate(array $whereData, array $data): Model;

    /**
     * @param array $ids
     * @param array $data
     * @return bool
     */
    public function updateIn(array $ids, array $data): bool;

    /**
     * @param array $whereData
     * @param array $data
     * @return bool
     */
    public function updateWhere(array $whereData, array $data): bool;

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @param int $id
     * @return bool
     */
    public function physicallyDelete(int $id): bool;

    /**
     * @param Model $model
     * @param array $mlsData
     */
    public function saveMl(Model $model, array $mlsData): void;
}
