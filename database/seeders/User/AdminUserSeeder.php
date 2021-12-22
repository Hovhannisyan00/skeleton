<?php

namespace Database\Seeders\User;

use App\Models\RoleAndPermission\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;

/**
 * Class AdminUserSeeder
 * @package Database\Seeders
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Admin Seeder
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->firstOrCreate([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $user->assignRole(Role::ROLE_SUPER_ADMIN);
    }
}
