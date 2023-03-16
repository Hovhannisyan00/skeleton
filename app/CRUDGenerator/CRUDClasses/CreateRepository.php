<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateRepository extends CRUDGeneratorAbstract
{
    public const REPOSITORY = 'repository';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::REPOSITORY);
    }

    /**
     *
     */
    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    /**
     *
     */
    public function getMessageText(): string
    {
        return "{$this->className}Repository";
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
