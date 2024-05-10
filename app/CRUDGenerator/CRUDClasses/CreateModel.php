<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateModel extends CRUDGeneratorAbstract
{
    public const MODEL = 'model';

    public const MODEL_WITH_ML = 'model_with_ml';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig($arguments['migrationMl'] ? self::MODEL_WITH_ML : self::MODEL);
    }

    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    public function getMessageText(): string
    {
        return $this->className.' model';
    }

    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className,
        ];
    }
}
