<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * class Base
 * @package App\View\Components\Dashboard
 */
class Base extends Component
{
    const DASHBOARD_COMPONENTS_PREFIX = 'components.dashboard';

    public function render()
    {
        // TODO: Implement render() method.
    }

    /**
     * Function to show dashboard component
     *
     * @param string|null $componentName
     * @param array|null $vars
     * @return View
     */
    public function dashboardComponent(string $componentName = null, ?array $vars = []): View
    {
        return view(self::DASHBOARD_COMPONENTS_PREFIX . ($componentName ? '.' . $componentName : $componentName), $vars);
    }
}
