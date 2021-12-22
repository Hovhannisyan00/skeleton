<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class CreateController
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateController extends CRUDGeneratorAbstract
{
    const CONTROLLER = 'controller';

    /**
     * CreateController constructor.
     *
     * @param $className
     */
    public function __construct($className)
    {
        parent::__construct($className);

        $this->config = $this->getConfig(self::CONTROLLER);
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
        return "{$this->className}Controller";
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        $singularClassName = Str::snake(Str::singular($this->className), ' ');
        $pluralClassName = Str::snake(Str::plural($this->className), ' ');
        $folderName = Str::snake($this->className, '-');

        return [
            'CLASS_NAME' => $this->className,
            'SINGULAR_CLASS_NAME' => $singularClassName,
            'PLURAL_CLASS_NAME' => $pluralClassName,
            'FOLDER_NAME' => $folderName
        ];
    }
}
