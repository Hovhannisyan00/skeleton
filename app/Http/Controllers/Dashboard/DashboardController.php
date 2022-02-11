<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Dashboard
 */
class DashboardController extends BaseController
{
    /**
     * Function to show dashboard page
     *
     * @return View
     */
    public function index(): View
    {
        return $this->dashboardView('dashboard');
    }
}
