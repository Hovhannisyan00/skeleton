<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use App\Models\ResearchArea\ResearchArea;
use App\Models\User\User;
use Database\Seeders\ResearchArea\ResearchAreaSeeder;
use Database\Seeders\User\AdminUserSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        ResearchArea::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            RoleAndPermissionSeeder::class,
            AdminUserSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            ResearchAreaSeeder::class,
        ]);
    }
}
