<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

class CreateJs extends CRUDGeneratorAbstract
{
    public const JS = 'js';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::JS);
    }

    public function make(): void
    {
        foreach ($this->config['files'] as $file) {
            $this->createFolderAndFile($this->getSourceFile($file));
        }
    }

    public function getMessageText(): string
    {
        return ucfirst(self::JS);
    }

    /**
     * Function to return stub variables.
     */
    protected function stubVariables(): array
    {
        $className = Str::snake($this->className, '-');
        $routeName = Str::snake(Str::plural($this->className), '-');

        return [
            'CLASS_NAME' => $className,
            'ROUTE_NAME' => $routeName,
        ];
    }
}
