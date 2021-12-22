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
                'title' => 'Users',
                'slug' => 'users',
                'url' => route('dashboard.users.index'),
                'icon' => 'flaticon-users-1',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMINISTRATOR]
            ],
            [
                'title' => 'Research Areas',
                'slug' => 'research-areas',
                'url' => route('dashboard.research-areas.index'),
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMINISTRATOR]
            ],
            [
                'title' => 'Articles',
                'slug' => 'articles',
                'url' => route('dashboard.articles.index'),
                'icon' => 'fab fa-autoprefixer',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMINISTRATOR]
            ],
            [
                'title' => 'Translation Manager',
                'slug' => 'translation-manager',
                'url' => route('dashboard.translation.manager'),
                'icon' => 'fas fa-language',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMINISTRATOR]
            ],

        ];

        foreach ($menus as $menu) {
            $createdMenu = Menu::create($menu);
            $createdMenu->assignRole($menu['role']);
        }
    }
}
