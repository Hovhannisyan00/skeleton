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
                'name' => Role::ROLE_ADMINISTRATOR,
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => Role::ROLE_STUDENT,
                'guard_name' => 'web',
            ],
            [
                'id' => 4,
                'name' => Role::ROLE_FACILITATOR,
                'guard_name' => 'web',
            ],
            [
                'id' => 5,
                'name' => Role::ROLE_SENIOR_FACILITATOR,
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            Role::query()->insert($role);
        }
    }
}
