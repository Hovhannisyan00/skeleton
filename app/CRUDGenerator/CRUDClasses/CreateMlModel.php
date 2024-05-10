<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

class CreateMlModel extends CRUDGeneratorAbstract
{
    public const ML_MODEL = 'ml_model';

    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::ML_MODEL);
    }

    public function make(): void
    {
        if ($this->arguments['migrationMl']) {
            $this->createFolderAndFile($this->getSourceFile($this->config));
        }
    }

    public function getMessageText(): string
    {
        return $this->arguments['migrationMl'] ? $this->className.' ml model' : '';
    }

    /**
     * Function to return stub variables.
     */
    protected function stubVariables(): array
    {
        $variableName = Str::snake($this->className);

        return [
            'CLASS_NAME' => $this->className,
            'VARIABLE_NAME' => $variableName,
        ];
    }
}
