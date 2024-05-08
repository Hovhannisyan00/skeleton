<?php

namespace Database\Seeders\User;

use App\Models\RoleAndPermission\Enums\RoleType;
use App\Models\User\User;
use Hash;
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
            'password' => Hash::make('password'),
        ]);

        $user->assignRole(RoleType::ADMIN);
    }
}
