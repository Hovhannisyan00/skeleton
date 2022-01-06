<?php

namespace Database\Seeders;

use App\Models\RoleAndPermission\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleAndPermissionSeeder
 * @package Database\Seeders
 */
class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Role And Permission Seeder
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => Role::ROLE_SUPER_ADMIN,
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => Role::ROLE_USER,
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            Role::query()->insert($role);
        }
    }
}
