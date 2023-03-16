<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

class CreateRequest extends CRUDGeneratorAbstract
{
    public const REQUEST = 'request';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::REQUEST);
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
        return "{$this->className}Request";
    }

    /**
     * Function to return stub variables
     */
    protected function stubVariables(): array
    {
        $singularClassName = strtolower(Str::singular($this->className));
        $pluralClassName = strtolower(Str::plural($this->className));

        return [
            'CLASS_NAME' => $this->className,
            'SINGULAR_CLASS_NAME' => $singularClassName,
            'PLURAL_CLASS_NAME' => $pluralClassName,
        ];
    }
}
