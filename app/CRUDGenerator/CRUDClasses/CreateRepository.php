<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CreateRepository
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateRepository extends CRUDGeneratorAbstract
{
    const REPOSITORY = 'repository';

    /**
     * CreateRepository constructor.
     *
     * @param $className
     */
    public function __construct($className)
    {
        parent::__construct($className);

        $this->config = $this->getConfig(self::REPOSITORY);
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
