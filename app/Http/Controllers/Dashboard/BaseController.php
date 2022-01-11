<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\Helpers\ResponseFunctions;
use Illuminate\Contracts\View\View;

/**
 * Class BaseController
 * @package App\Http\Controllers\Dashboard
 */
class BaseController extends Controller
{
    use ResponseFunctions;

    /**
     * @var string
     */
    protected const DASHBOARD_VIEW_PREFIX = 'components.dashboard';

    /**
     * @var null
     */
    protected $service = null;

    /**
     * @var null
     */
    protected $repository = null;

    /**
     * Function to show dashboard view
     *
     * @param string|null $view
     * @param array|null $vars
     * @param string $viewMode
     * @return View
     */
    public function dashboardView(string $view = null, ?array $vars = [], string $viewMode = 'add'): View
    {
        $vars['viewMode'] = $viewMode;

        $this->generateSubHeaderData($view, $viewMode);

        return view(self::DASHBOARD_VIEW_PREFIX . ($view ? '.' . $view : $view), $vars);
    }

    /**
     * Function to generate sub header data
     *
     * @param $view
     * @param $viewMode
     * @return void
     */
    private function generateSubHeaderData($view, $viewMode): void
    {
        // Form mode
        view()->composer('*.form', function () use ($view, $viewMode) {
            view()->share('subHeaderData', ['pageName' => $view . '.' . $viewMode]);
        });

        // Index mode
        view()->composer('*.index', function () use ($view) {
            view()->share('subHeaderData', ['pageName' => $view]);
        });
    }
}
