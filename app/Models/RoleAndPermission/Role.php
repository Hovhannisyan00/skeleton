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
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_STUDENT = 'student';
    const ROLE_FACILITATOR = 'facilitator';
    const ROLE_SENIOR_FACILITATOR = 'senior-facilitator';

    /**
     * @var array
     */
    const ROLES = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_ADMINISTRATOR,
        self::ROLE_STUDENT,
        self::ROLE_FACILITATOR,
        self::ROLE_SENIOR_FACILITATOR,
    ];

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];
}
