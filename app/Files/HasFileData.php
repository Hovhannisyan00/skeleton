<?php

namespace App\Files;

/**
 * Trait HasFileData
 * @package App\Files
 */
trait HasFileData
{
    abstract public function setFileConfigName(): string;

    /**
     * Function to get model file config name
     *
     * @return string
     */
    public function getFileConfigName(): string
    {
        $configKey = "files.{$this->setFileConfigName()}";
        if (!config()->has($configKey)) {
            throw new \Exception("Config: $configKey Not found");
        }

        return $this->setFileConfigName();
    }
}
