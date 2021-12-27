<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

/**
 * Class CreateRequest
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateRequest extends CRUDGeneratorAbstract
{
    const REQUEST = 'request';

    /**
     * CreateRequest constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::REQUEST);
    }

    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return "{$this->className}Request";
    }

    /**
     * Function to return stub variables
     *
     * @return array
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
