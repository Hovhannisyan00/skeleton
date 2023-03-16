<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateModel extends CRUDGeneratorAbstract
{
    public const MODEL = 'model';
    public const MODEL_WITH_ML = 'model_with_ml';

    /**
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
     */
    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className
        ];
    }
}
