<?php

namespace App\Models\RoleAndPermission;

use App\Models\RoleAndPermission\Enums\RoleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];

    public static function getRolesFormatted(): string
    {
        return implode('|', RoleType::ALL);
    }

    public static function getRoleNames(array $ids)
    {
        return Role::whereIn('id', $ids)->pluck('name')->all();
    }
}
