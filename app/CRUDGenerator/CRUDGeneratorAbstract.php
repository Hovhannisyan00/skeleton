<?php

namespace App\CRUDGenerator;

use App\CRUDGenerator\Traits\CRUDHelper;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class CRUDGeneratorAbstract
 * @package App\CRUDGenerator
 */
abstract class CRUDGeneratorAbstract
{
    use CRUDHelper;

    /**
     * @var array
     */
    protected $arguments;

    /**
     * @var string
     */
    protected $className;

    /**
     * @var array
     */
    protected $config;

    /**
     * CRUDGeneratorAbstract constructor.
     *
     * @param $arguments
     */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
        $this->className = $arguments['className'];
    }

    /**
     * @return mixed
     */
    abstract protected function make(): void;

    /**
     * @return string
     */
    abstract protected function getMessageText(): string;

    /**
     * Function to show message in terminal
     */
    public function showMessage()
    {
        (new ConsoleOutput())->writeln("<fg=green>{$this->getMessageText()} created successfully!</>");
    }

    /**
     * Function to get CRUD config by key
     *
     * @param $key
     * @return Repository|Application|mixed
     */
    protected function getConfig($key)
    {
        return config("crud.$key");
    }

    /**
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    abstract protected function stubVariables(): array;

    /**
     * Function to return stub directory path
     *
     * @param $fileInfo
     * @return string
     */
    protected function getStubDirectoryPath($fileInfo): string
    {
        return isset($fileInfo['stub_directory_path']) ? $fileInfo['stub_directory_path'] . '/' : '';
    }

    /**
     * Return the stub file path
     *
     * @param $fileInfo
     * @return string
     */
    protected function getStubFilePath($fileInfo): string
    {
        $path = $this->getStubDirectoryPath($fileInfo);
        $stub_file_name = $fileInfo['stub_file_name'];

        return __DIR__ . "/Stubs/$path$stub_file_name.stub";
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return array|false|string|string[]
     */
    protected function getStubContents($stub, array $stubVariables = [])
    {
        $stubVariables['ROOT_NAMESPACE'] = app()->getNamespace();

        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace("{{ $search }}", $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return array|string[]
     */
    protected function getSourceFile($fileInfo = null): array
    {
        return [
            'content' => $this->getStubContents($this->getStubFilePath($fileInfo), $this->stubVariables()),
            'variables' => $this->stubVariables(),
            'fileInfo' => $fileInfo
        ];
    }

    /**
     * Function to check crud has ml
     *
     * @return bool
     */
    public function hasMl(): bool
    {
        if ($this->arguments['migrationMl']) {
            return true;
        }

        return false;
    }


}
