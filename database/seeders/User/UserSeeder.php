<?php

namespace Database\Seeders\User;

use App\Models\RoleAndPermission\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(100)->create();

        foreach ($users as $user){
            $user->assignRole(Role::ROLE_USER);
        }
    }
}
