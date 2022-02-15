<?php

namespace App\CRUDGenerator;

use App\CRUDGenerator\Traits\CRUDHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class CRUDGeneratorDelete
 * @package App\CRUDGenerator
 */
class CRUDGeneratorDelete
{
    use CRUDHelper;

    /**
     * @var string
     */
    protected string $className;

    /**
     * CRUDGeneratorAbstract constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        $this->className = $arguments['className'];
    }

    /**
     * Function to remove crud generated data
     *
     * @return void
     */
    public function deleteCrudData(): void
    {
        $crudConfig = config('crud');
        $disk = Storage::disk('base');
        $escapeModules = ['model_with_ml', 'ml_model', 'model_search', 'search_request'];

        foreach ($crudConfig as $moduleName => $module) {

            if (in_array($moduleName, $escapeModules)) {
                continue;
            }

            if ($moduleName != 'controller') {

                $className = $this->className;
                if (in_array($moduleName, ['blades', 'js'])) {
                    $className = Str::snake($className, '-');
                }

                $absolutePath = $this->replaceAttributeByClassName($module['path'], $className);

                if ($disk->exists($absolutePath)) {
                    $disk->deleteDirectory($absolutePath);
                } else {
                    (new ConsoleOutput())->writeln("<fg=red>$absolutePath :Not Found!!</>");
                }

            } else {

                $absolutePath = $module['path'] . '\\' . $this->replaceAttributeByClassName($module['file_name']);

                if ($disk->exists($absolutePath)) {
                    unlink($absolutePath);
                } else {
                    (new ConsoleOutput())->writeln("<fg=red>$absolutePath :Not Found!!</>");
                }
            }
        }

        (new ConsoleOutput())->writeln("<fg=red>Migration Please remove Manually!!</>");
        (new ConsoleOutput())->writeln("<fg=red>From RepositoryServiceProvider Please remove Manually!!</>");
        (new ConsoleOutput())->writeln("<fg=red>From Routes Please remove Manually!!</>");
        (new ConsoleOutput())->writeln("<fg=green>SuccessFully Deleted!!</>");
    }
}
