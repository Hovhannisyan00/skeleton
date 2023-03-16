<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use App\Models\RoleAndPermission\Role;
use Illuminate\Database\Seeder;

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
                'icon' => 'fas fa-language fa-fw',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN],
            ],
            [
                'title' => 'Users',
                'slug' => 'users',
                'url' => route('dashboard.users.index', [], false),
                'icon' => 'fas fa-users fa-fw',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN],
            ],
            [
                'title' => 'Articles',
                'slug' => 'articles',
                'url' => route('dashboard.articles.index', [], false),
                'icon' => 'far fa-newspaper fa-fw',
                'type' => 'admin',
                'role' => [Role::ROLE_SUPER_ADMIN],
                /*'sub' =>  [
                    [
                        'title' => 'Sub Article',
                        'slug' => 'sub_articles',
                        'url' => route('dashboard.articles.index', [], false),
                        'type' => 'admin',
                        'role' => [Role::ROLE_SUPER_ADMIN]
                    ]
                ],*/
            ],
        ];

        foreach ($menus as $key => $menu) {
            if (!isset($menu['sort_order'])) {
                $menu['sort_order'] = $key + 1;
            }

            $createdMenu = Menu::create($menu);

            foreach ($menu['sub'] ?? [] as $subMenu) {
                $subMenu['parent_id'] = $createdMenu->id;
                $createdSubMenu = Menu::create($subMenu);

                $createdSubMenu->assignRole($subMenu['role']);
            }

            $createdMenu->assignRole($menu['role']);
        }
    }
}
