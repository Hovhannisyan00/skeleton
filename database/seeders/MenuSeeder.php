<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use App\Models\RoleAndPermission\Role;
use Illuminate\Database\Seeder;

/**
 * Class MenuSeeder
 * @package Database\Seeders
 */
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        Menu::reguard();

        $menus = [
            [
                'title' => 'Translation Manager',
                'slug' => 'translation-manager',
                'url' => route('dashboard.translation.manager', [], false),
                'icon' => 'fas fa-language',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN]
            ],
            [
                'title' => 'Users',
                'slug' => 'users',
                'url' => route('dashboard.users.index', [], false),
                'icon' => 'flaticon-users-1',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN]
            ],
            [
                'title' => 'Articles',
                'slug' => 'articles',
                'url' => route('dashboard.articles.index', [], false),
                'icon' => 'fab fa-autoprefixer',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN]
            ],
        ];

        foreach ($menus as $menu) {
            $createdMenu = Menu::create($menu);
            $createdMenu->assignRole($menu['role']);
        }
    }
}
