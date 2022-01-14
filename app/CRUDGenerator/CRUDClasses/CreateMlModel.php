<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

/**
 * Class CreateModel
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateMlModel extends CRUDGeneratorAbstract
{
    const ML_MODEL = 'ml_model';

    /**
     * CreateModel constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::ML_MODEL);
    }

    public function make(): void
    {
        if ($this->arguments['migrationMl']){
            $this->createFolderAndFile($this->getSourceFile($this->config));
        }
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->className . ' ml model';
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        $variableName = Str::snake($this->className, '_');

        return [
            'CLASS_NAME' => $this->className,
            'VARIABLE_NAME' => $variableName
        ];
    }
}
