<?php

namespace App\Repositories\Role;

use App\Contracts\Role\IRoleRepository;
use App\Models\RoleAndPermission\Role;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

/**
 * Class RoleRepository
 * @package App\Repositories\Role
 */
class RoleRepository extends BaseRepository implements IRoleRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
