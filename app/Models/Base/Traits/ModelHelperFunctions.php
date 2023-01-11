<?php

namespace App\Models\Base\Traits;

use Exception;
use Illuminate\Support\Str;
use ReflectionClass;

trait ModelHelperFunctions
{
    /**
     * Function to get model class name
     *
     * @return string
     */
    public static function getClassName(): string
    {
        return lcfirst(Str::snake(class_basename(static::class)));
    }

    /**
     * Function to get model class name camel case
     *
     * @return string
     */
    public static function getClassNameCamelCase(): string
    {
        return Str::camel(class_basename(static::class));
    }

    /**
     * Function to get class namespace
     *
     * @return string
     */
    public function getClassNamespace(): string
    {
        $namespace = new ReflectionClass(static::class);
        return $namespace->getNamespaceName();
    }

    /**
     * Function to get table name
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return (new static())->getTable();
    }

    /**
     * Function to check model has files
     *
     * @return bool
     */
    public function hasFilesData(): bool
    {
        return in_array(HasFileData::class, array_keys((new ReflectionClass(static::class))->getTraits()));
    }

    /**
     * Function to check model has show_status column
     *
     * @return bool
     */
    public function hasShowStatus(): bool
    {
        if (in_array('show_status', $this->getFillable())) {
            return true;
        }

        return false;
    }

    /**
     * Function to get model file config file
     *
     * @return array
     * @throws Exception
     */
    public function getFileConfig(): array
    {
        if (!$this->hasFilesData()) {
            throw new Exception('In Model Please use HasFilesData trait');
        }

        return config('files.' . $this->getFileConfigName());
    }
}
