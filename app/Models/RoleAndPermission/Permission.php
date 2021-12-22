<?php

namespace App\Models\RoleAndPermission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @package App\Models\RoleAndPermission
 */
class Permission extends SpatiePermission
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name'];
}
