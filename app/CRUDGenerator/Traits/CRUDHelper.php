<?php

namespace App\CRUDGenerator\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * Trait CRUDHelper
 * @package App\CRUDGenerator\Traits
 */
trait CRUDHelper
{

    /**
     * Function to create file.
     *
     * @param $data
     * @return void
     */
    public function createFolderAndFile($data): void
    {
        $disk = Storage::disk('base');
        $fileInfo = $data['fileInfo'];
        $variables = $data['variables'];
        $fileName = $fileInfo['file_name'];
        $fileName = $this->replaceAttributeByClassName($fileName);
        $path = $this->replaceAttributeByClassName($this->config['path'], $variables['CLASS_NAME'] ?? '');

        $absolutePath = $path . '\\' . $fileName;

        if (!$disk->exists($absolutePath)) {
            $disk->put($absolutePath, $data['content']);
        }
    }

    /**
     * Function to replace :attribute to class name
     *
     * @param $fileName
     * @param null $CLASS_NAME
     * @return array|string|string[]
     */
    protected function replaceAttributeByClassName($fileName, $CLASS_NAME = null)
    {
        return str_replace(':attribute', ($CLASS_NAME ?? $this->className), $fileName);
    }
}
