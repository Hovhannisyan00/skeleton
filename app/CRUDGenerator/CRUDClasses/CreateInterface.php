<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateInterface extends CRUDGeneratorAbstract
{
    public const INTERFACE = 'interface';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::INTERFACE);
    }

    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    public function getMessageText(): string
    {
        return "I{$this->className}Repository";
    }

    /**
     * Function to return stub variables.
     */
    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className,
        ];
    }
}
