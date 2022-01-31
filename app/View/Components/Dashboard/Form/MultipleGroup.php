<?php

namespace App\View\Components\Dashboard\Form;

use App\View\Components\Dashboard\Base;
use DOMDocument;
use DOMXPath;
use Illuminate\Contracts\View\View;

class MultipleGroup extends Base
{
    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $index;

    /**
     * @var []
     */
    public $multipleData;

    /**
     * @var []
     */
    public $groupData;

    const ATTRIBUTE_NAME = 'name';
    const ATTRIBUTE_DATA_NAME = 'data-name';

    const TAG_INPUT = 'input';
    const TAG_TEXTAREA = 'textarea';

    /**
     * MultipleGroup constructor.
     * @param string $class
     * @param string $index
     * @param array $multipleData
     */
    public function __construct(string $class = '', string $index = '0', $multipleData = [])
    {
        $this->class = $class;
        $this->index = $index;
        $this->multipleData = $multipleData;
        $this->groupData = $multipleData;
    }

    /**
     * Function to render html
     *
     * @param string $html
     * @param array $multipleData
     */
    public function renderHtml(string $html, $multipleData, string $index)
    {
        $this->multipleData = $multipleData;
        $this->index = $index;
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $this->find($xpath, '//span[@data-name]', self::ATTRIBUTE_DATA_NAME);
        $this->find($xpath, '//input[@name]');
        $this->find($xpath, '//textarea[@name]');

        echo $dom->saveHTML();
    }

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
        foreach ($inputs as $index => $input) {

            $name = $input->getAttribute($attribute);
            $dotName = getArrayNameDot($name);

            if ($attribute == self::ATTRIBUTE_DATA_NAME) {

                $newval = str_replace('0', $this->index, $dotName);

            } else {

                $name = $input->getAttribute($attribute);
                if (!empty($this->multipleData)) {
                    $this->setValue($input, $input->getAttribute('data-name'));
                }

                $newval = str_replace('0', $this->index, $name);
            }


            $input->setAttribute($attribute, $newval);


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
        if($name){
            $columnValue = $this->multipleData[$name];
        }else{
            $columnValue = $this->multipleData;
        }

        $tagName = $input->tagName;
        if ($tagName === self::TAG_INPUT) {
            $input->setAttribute('value', $columnValue);
        } elseif ($tagName === self::TAG_TEXTAREA) {
            $input->textContent = $columnValue;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return $this->dashboardComponent('form._multiple-group');
    }
}
