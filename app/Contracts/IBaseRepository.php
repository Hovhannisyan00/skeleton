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
    public function getInstance(): Model;

    public function create(array $data): Model;

    public function insert(array $data): bool;

    public function find(int $id): Model;

    public function findOrFail(int $id): Model;

    public function findOrFailUUID(string $id): Model;

    public function firstOrFailByUUID(string $uuid): Model;

    public function firstOrFailByToken(string $token): Model;

    public function all(): Collection;

    public function get(array $columns = null): Collection;

    public function getWhereIn(array $whereIn): Collection;

    public function getForSelect(string $column = 'name', string $key = 'id'): Collection;

    public function getForSelectMl(string $column = 'name', string $key = 'id'): Collection;

    public function update(int $id, array $data): Model;

    public function updateOrCreate(array $whereData, array $data): Model;

    public function updateIn(array $ids, array $data): bool;

    public function updateWhere(array $whereData, array $data): bool;

    public function destroy(int $id): bool;

    public function saveMl(Model $model, array $mlsData): void;
}
