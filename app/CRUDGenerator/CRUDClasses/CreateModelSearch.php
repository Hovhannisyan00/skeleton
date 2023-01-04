<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

/**
 * Class CreateModel
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateModelSearch extends CRUDGeneratorAbstract
{
    public const MODEL_SEARCH = 'model_search';

    /**
     * CreateModel constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::MODEL_SEARCH);
    }

    /**
     * @return void
     */
    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->className . 'Search';
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className
        ];
    }
}
