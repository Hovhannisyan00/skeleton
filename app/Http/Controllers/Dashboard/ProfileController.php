<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\User\UserService;
use Illuminate\Contracts\View\View;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Dashboard
 */
class ProfileController extends BaseController
{
    /**
     * ProfileController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * Function to show profile page
     *
     * @return View
     */
    public function index()
    {
        return $this->dashboardView('profile.index');
    }
}
