<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\Base\BaseController;
use Illuminate\Contracts\View\View;

class DashboardController extends BaseController
{
    public function index(): View
    {
        return $this->dashboardView('dashboard');
    }
}
