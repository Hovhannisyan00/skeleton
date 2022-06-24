<?php

namespace App\View\Components\Dashboard\Form;

use App\View\Components\Dashboard\Base;
use Illuminate\Contracts\View\View;

/**
 * Class FormMl
 * @package App\View\Components\Dashboard\Form
 */
class FormMl extends Base
{
    /**
     * @var null
     */
    public $showStatus;

    /**
     * @var string
     */
    public $action;

    /**
     * @var string
     */
    public $indexUrl;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $viewMode;

    /**
     * FormMl constructor.
     *
     * @param $showStatus
     * @param string $action
     * @param string $indexUrl
     * @param string $method
     * @param string $viewMode
     */
    public function __construct($showStatus = null, string $action = '', string $indexUrl = '', string $method = '',string $viewMode = 'add')
    {
        $this->showStatus = $showStatus;
        $this->action = $action;
        $this->indexUrl = $indexUrl;
        $this->method = $method;
        $this->viewMode = $viewMode;
    }

    /**
     * @param $slot
     * @param $lngCode
     * @param string $mlData
     */
    public function renderMlHtml($slot, $lngCode, $mlData = '')
    {
        $mlForm = new MlTabs();

        return $mlForm->renderHtml($slot, $lngCode, $mlData);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return $this->dashboardComponent('form._form_ml');
    }
}
