<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

/**
 * Class CreateJs
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateJs extends CRUDGeneratorAbstract
{
    const JS = 'js';

    /**
     * CreateJs constructor.
     *
     * @param $className
     */
    public function __construct($className)
    {
        parent::__construct($className);

        $this->config = $this->getConfig(self::JS);
    }

    public function make(): void
    {
        foreach ($this->config['files'] as $file) {
            $this->createFolderAndFile($this->getSourceFile($file));
        }
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return ucfirst(self::JS);
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        $className = Str::snake(Str::plural($this->className), '-');

        return [
            'CLASS_NAME' => $className
        ];
    }
}
