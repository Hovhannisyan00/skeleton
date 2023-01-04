<?php

namespace App\View\Components\Dashboard\Form;

use App\View\Components\Dashboard\Base;
use DOMDocument;
use DOMXPath;
use Illuminate\Contracts\View\View;

class MlTabs extends Base
{
    /**
     * @var string
     */
    public const ATTRIBUTE_NAME = 'name';
    public const ATTRIBUTE_DATA_NAME = 'data-name';

    /**
     * @var string
     */
    public const TAG_INPUT = 'input';
    public const TAG_TEXTAREA = 'textarea';

    /**
     * @var string
     */
    protected string $lngCode;

    /**
     * @var mixed
     */
    protected mixed $mlData;

    /**
     * Function to find by selector and change html tag
     *
     * @param $xpath
     * @param string $selector
     * @param string $attribute
     */
    private function find($xpath, string $selector, string $attribute = self::ATTRIBUTE_NAME)
    {
        $elements = $xpath->query($selector);
        $this->changeNameAndSetValue($elements, $attribute);
    }

    /**
     * Function to change html tag name and set value
     *
     * @param $inputs
     * @param $attribute
     */
    private function changeNameAndSetValue($inputs, $attribute)
    {
        foreach ($inputs as $input) {
            $name = $input->getAttribute($attribute);
            if ($this->mlData && $this->mlData->count()) {
                $this->setValue($input, $name);
            }

            $multipleName = '';
            if (($pos = strpos($name, "[")) !== false) {
                $multipleName = substr($name, $pos);
                $name = explode('[', $name, 2)[0];
            }

            if ($attribute == self::ATTRIBUTE_NAME) {
                $newValue = "ml[$this->lngCode][$name]$multipleName";
            } else {

                $multipleName = replaceNameWithDots($multipleName);

                $newValue = "ml.$this->lngCode.$name$multipleName";
            }

            $input->setAttribute($attribute, $newValue);
        }
    }

    /**
     * Function to element set value
     *
     * @param $input
     * @param $name
     */
    private function setValue($input, $name)
    {
        $columnValue = $this->mlData[$this->lngCode]->$name;
        $tagName = $input->tagName;
        if ($tagName === self::TAG_INPUT) {
            $input->setAttribute('value', $columnValue);
        } elseif ($tagName === self::TAG_TEXTAREA) {
            $input->textContent = $columnValue ?? '';
        }
    }

    /**
     *  Function to render html
     *
     * @param string $html
     * @param string $lngCode
     * @param array $mlData
     */
    public function renderHtml(string $html, string $lngCode, mixed $mlData = null)
    {
        $this->lngCode = $lngCode;
        $this->mlData = $mlData;
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $this->find($xpath, '//span[@data-name]', self::ATTRIBUTE_DATA_NAME);
        $this->find($xpath, '//input[@name]');
        $this->find($xpath, '//textarea[@name]');
        echo $dom->saveHTML();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return $this->dashboardComponent('form._ml_tabs');
    }
}
