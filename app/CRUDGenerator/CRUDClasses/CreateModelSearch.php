<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateModelSearch extends CRUDGeneratorAbstract
{
    public const MODEL_SEARCH = 'model_search';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::MODEL_SEARCH);
    }

    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    public function getMessageText(): string
    {
        return $this->className . 'Search';
    }

    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className,
        ];
    }
}
