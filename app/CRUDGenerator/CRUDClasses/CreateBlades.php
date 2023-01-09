<?php

namespace App\CRUDGenerator\CRUDClasses;

use App\CRUDGenerator\CRUDGeneratorAbstract;
use Illuminate\Support\Str;

class CreateBlades extends CRUDGeneratorAbstract
{
    public const BLADES = 'blades';

    /**
     * @param $arguments
     */
    public function __construct($arguments)
    {
        parent::__construct($arguments);

        $this->config = $this->getConfig(self::BLADES);
    }

    /**
     * @return void
     */
    public function make(): void
    {
        foreach ($this->config['files'] as $file) {
            if ($this->hasMl() && $file['stub_file_name'] === 'form.blade') {
                $file['stub_file_name'] = 'form_ml.blade';
            }

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
