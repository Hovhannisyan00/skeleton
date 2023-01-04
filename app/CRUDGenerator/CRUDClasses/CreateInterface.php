<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;

/**
 * Class CreateInterface
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateInterface extends CRUDGeneratorAbstract
{
    public const INTERFACE = 'interface';

    /**
     * CreateInterface constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::INTERFACE);
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
        return "I{$this->className}Repository";
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
