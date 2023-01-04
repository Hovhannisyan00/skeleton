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
    public const ROLE_SUPER_ADMIN = 'super-admin';
    public const ROLE_USER = 'user';

    /**
     * @var array
     */
    public const ROLES = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_USER,
    ];

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];
}
