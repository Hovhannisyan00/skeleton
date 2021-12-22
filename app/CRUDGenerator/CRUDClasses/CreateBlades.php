<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

/**
 * Class CreateBlades
 * @package App\CRUDGenerator\CRUDClasses
 */
class CreateBlades extends CRUDGeneratorAbstract
{
    const BLADES = 'blades';

    /**
     * CreateBlades constructor.
     *
     * @param $className
     */
    public function __construct($className)
    {
        parent::__construct($className);

        $this->config = $this->getConfig(self::BLADES);
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
        return ucfirst(self::BLADES);
    }

    /**
     * Function to return stub variables
     *
     * @return array
     */
    protected function stubVariables(): array
    {
        $className = Str::snake($this->className, '-');
        $variableName = lcfirst(Str::singular($this->className));
        $routeName = strtolower(Str::plural($className));

        return [
            'CLASS_NAME' => $className,
            'VARIABLE_NAME' => $variableName,
            'ROUTE_NAME' => $routeName
        ];
    }
}
