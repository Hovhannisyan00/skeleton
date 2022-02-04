<?php

namespace App\View\Components\Dashboard\Menu;

use App\Models\Menu\Menu;
use App\View\Components\Dashboard\Base;
use Illuminate\Contracts\View\View;

/**
 * class MenuComponent
 * @package App\View\Components\Dashboard\Menu
 */
class MenuComponent extends Base
{
    /**
     * Menu constructor
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Function to render Menu view
     *
     * @return View
     */
    public function render(): View
    {
        $groupName = Menu::admin()
            ->whereNull('parent_id')
            ->with('subMenu')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('group_name');

        return $this->dashboardComponent('menu.menu-component', [
            'groupName' => $groupName
        ]);
    }
}
