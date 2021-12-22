<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

/**
 * Class CreateModel
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateModel extends CRUDGeneratorAbstract
{
    const MODEL = 'model';

    /**
     * CreateModel constructor.
     *
     * @param $className
     */
    public function __construct($className)
    {
        parent::__construct($className);

        $this->config = $this->getConfig(self::MODEL);
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
        return $this->className . ' model';
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        return [
            'CLASS_NAME' => $this->className
        ];
    }
}
