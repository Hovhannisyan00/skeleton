<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\IBaseRepository;
use App\Http\Controllers\Controller;
use App\Services\BaseService;
use App\Traits\Helpers\ResponseFunctions;
use Illuminate\Contracts\View\View;

abstract class BaseController extends Controller
{
    use ResponseFunctions;

    /**
     * @var string
     */
    protected const DASHBOARD_VIEW_PREFIX = 'components.dashboard';

    /**
     * @var BaseService
     */
    protected BaseService $service;

    /**
     * @var IBaseRepository
     */
    protected IBaseRepository $repository;

    /**
     * Function to show dashboard view
     */
    protected function dashboardView(string $view, array $vars = [], string $viewMode = 'add'): View
    {
        $vars['viewMode'] = $viewMode;

        $this->generateSubHeaderData($view, $viewMode);

        return view(self::DASHBOARD_VIEW_PREFIX . '.' . $view, $vars);
    }

    /**
     * Function to render dashboard view
     */
    protected function renderDashboardView($view, array $vars = []): string
    {
        return view(self::DASHBOARD_VIEW_PREFIX . '.' . $view, $vars)->render();
    }

    /**
     * Function to generate sub header data
     */
    private function generateSubHeaderData(string $view, string $viewMode): void
    {
        // Form mode
        view()->composer('*.form', function () use ($view, $viewMode) {
            view()->share('subHeaderData', ['pageName' => $view . '.' . $viewMode]);
        });

        // Index mode
        view()->composer('*.index', function () use ($view) {
            view()->share('subHeaderData', ['pageName' => $view]);
            view()->share('isIndexPage', true);
        });
    }
}
