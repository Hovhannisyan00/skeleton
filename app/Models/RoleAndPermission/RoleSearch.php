<?php

namespace App\Models\RoleAndPermission;

use App\Models\Base\Search;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RoleSearch
 * @package App\Models\RoleAndPermission
 */
class RoleSearch extends Search
{
    /**
     * @var string[]
     */
    protected array $orderables = [
        'id',
        'name',
    ];

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        $filters = $this->filters;

        return Role::select(
            'id',
            'name',
            'created_at'
        )
            ->when(!empty($filters['id']), function ($query) use ($filters) {
                $query->where('id', $filters['id']);
            })
            ->when(!empty($filters['name']), function ($query) use ($filters) {
                $query->like('name', $filters['name']);
            })
            ->when(!empty($filters['created_at']), function ($query) use ($filters) {
                $query->orderBy('created_at', $filters['created_at']);
            });
    }

    /**
     * @return int
     */
    public function totalCount(): int
    {
        return Role::count();
    }

}
