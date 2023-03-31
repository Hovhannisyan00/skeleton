<?php

namespace App\Models\RoleAndPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * @var string
     */
    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';

    /**
     * @var array
     */
    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_USER,
    ];

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];

    public static function getRolesFormatted(): string
    {
        return self::get()->implode('name','|');
    }
}
