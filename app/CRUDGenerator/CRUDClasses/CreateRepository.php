<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

/**
 * Class CreateRepository
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateRepository extends CRUDGeneratorAbstract
{
    public const REPOSITORY = 'repository';

    /**
     * CreateRepository constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::REPOSITORY);
    }

    /**
     * @return void
     */
    public function make(): void
    {
        $this->createFolderAndFile($this->getSourceFile($this->config));
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return "{$this->className}Repository";
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
