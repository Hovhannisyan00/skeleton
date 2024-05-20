<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

class CreateService extends CRUDGeneratorAbstract
{
    public const SERVICE = 'service';

    public function __construct(array $arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::SERVICE);
    }

    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    public function getMessageText(): string
    {
        return "{$this->className}Service";
    }

    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className,
        ];
    }
}
