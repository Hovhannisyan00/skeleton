<?php

namespace App\Models\RoleAndPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package App\Models\RoleAndPermission
 */
class Role extends SpatieRole
{
    use HasFactory;

    /**
     * @var string
     */
    const ROLE_SUPER_ADMIN = 'super-admin';
    const ROLE_USER = 'user';

    /**
     * @var array
     */
    const ROLES = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_USER,
    ];

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];
}
