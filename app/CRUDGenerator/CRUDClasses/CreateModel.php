<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

/**
 * Class CreateModel
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateModel extends CRUDGeneratorAbstract
{
    const MODEL = 'model';
    const MODEL_WITH_ML = 'model_with_ml';

    /**
     * CreateModel constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig($arguments['migrationMl'] ? self::MODEL_WITH_ML : self::MODEL);
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
        return $this->className . ' model';
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
