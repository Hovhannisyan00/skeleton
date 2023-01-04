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
    public string $class;

    /**
     * @var string
     */
    public string $index;

    /**
     * @var array
     */
    public mixed $multipleData;

    /**
     * @var array
     */
    public array $groupData;

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
    public const TAG_SELECT = 'select';

    /**
     * @param string $class
     * @param string $index
     * @param array $multipleData
     */
    public function __construct(
        string $class = '',
        string $index = '0',
        mixed  $multipleData = []
    )
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
     * @param string $index
     */
    public function renderHtml(string $html, mixed $multipleData, string $index)
    {
        $this->multipleData = $multipleData;
        $this->index = $index;
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $this->find($xpath, '//span[@data-name]', self::ATTRIBUTE_DATA_NAME);
        $this->find($xpath, '//input[@name]');
        $this->find($xpath, '//textarea[@name]');
        $this->find($xpath, '//select[@name]');

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
        foreach ($inputs as $input) {

            $name = $input->getAttribute($attribute);
            $replacedName = replaceNameWithDots($name);

            if ($attribute == self::ATTRIBUTE_DATA_NAME) {

                $newValue = str_replace('0', $this->index, $replacedName);

            } else {

                $name = $input->getAttribute($attribute);
                if (!empty($this->multipleData)) {
                    $this->setValue($input, $input->getAttribute('data-name'));
                }

                $newValue = str_replace('0', $this->index, $name);
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
        if ($name) {
            $columnValue = $this->multipleData[$name];
        } else {
            $columnValue = $this->multipleData;
        }

        $tagName = $input->tagName;
        if ($tagName === self::TAG_INPUT) {
            $input->setAttribute('value', $columnValue);
        } elseif ($tagName === self::TAG_TEXTAREA) {
            $input->textContent = $columnValue;
        }elseif ($tagName === self::TAG_SELECT){
            $input->setAttribute('id', $input->getAttribute('id').'_'. rand());
            $optionTags = $input->getElementsByTagName('option');
            foreach ($optionTags as $tag){
                if ($tag->getAttribute('value') == $columnValue){
                    $tag->setAttribute('selected', 'selected');
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return $this->dashboardComponent('form._multiple_group');
    }
}
