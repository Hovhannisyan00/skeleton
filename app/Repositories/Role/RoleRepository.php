<?php

namespace App\Repositories\Role;

use App\Contracts\Role\IRoleRepository;
use App\Models\RoleAndPermission\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    /**
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
