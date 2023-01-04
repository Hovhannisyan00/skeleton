<?php

namespace App\CRUDGenerator;

use App\CRUDGenerator\Traits\CRUDHelper;
use Symfony\Component\Console\Output\ConsoleOutput;

abstract class CRUDGeneratorAbstract
{
    use CRUDHelper;

    /**
     * @var array
     */
    protected array $arguments;

    /**
     * @var string
     */
    protected string $className;

    /**
     * @var array
     */
    protected array $config;

    /**
     * @param $arguments
     */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
        $this->className = $arguments['className'];
    }

    /**
     * @return void
     */
    abstract protected function make(): void;

    /**
     * @return string
     */
    abstract protected function getMessageText(): string;

    /**
     * Function to show message in terminal
     *
     * @return void
     */
    public function showMessage(): void
    {
        if ($this->getMessageText()) {
            (new ConsoleOutput())->writeln("<fg=green>{$this->getMessageText()} created successfully!</>");
        }
    }

    /**
     * Function to get CRUD config by key
     *
     * @param $key
     * @return array
     */
    protected function getConfig($key): array
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
     * @param array $fileInfo
     * @return string
     */
    protected function getStubFilePath(array $fileInfo): string
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
     * @return string
     */
    protected function getStubContents($stub, array $stubVariables = []): string
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
     * @param array|null $fileInfo
     * @return array
     */
    protected function getSourceFile(array $fileInfo = null): array
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
