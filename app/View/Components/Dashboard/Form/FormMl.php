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
     * @var string|null
     */
    public ?string $showStatus;

    /**
     * @var string
     */
    public string $action;

    /**
     * @var string
     */
    public string $indexUrl;

    /**
     * @var string
     */
    public string $method;

    /**
     * @var string
     */
    public string $viewMode;

    /**
     * FormMl constructor.
     *
     * @param mixed $showStatus
     * @param string $action
     * @param string $indexUrl
     * @param string $method
     * @param string $viewMode
     */
    public function __construct(
        string $showStatus = null,
        string $action = '',
        string $indexUrl = '',
        string $method = '',
        string $viewMode = 'add'
    )
    {
        $this->showStatus = $showStatus;
        $this->action = $action;
        $this->indexUrl = $indexUrl;
        $this->method = $method;
        $this->viewMode = $viewMode;
    }

    /**
     * @param string $slot
     * @param string $lngCode
     * @param array $mlData
     * @return void
     */
    public function renderMlHtml(string $slot, string $lngCode, mixed $mlData = null)
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
