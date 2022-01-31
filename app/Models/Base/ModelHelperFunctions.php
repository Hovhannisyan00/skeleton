<?php

namespace App\Models\Base;

use App\Files\HasFileData;
use Illuminate\Support\Str;

/**
 * Trait ModelHelperFunctions
 * @package App\Models\Base
 */
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
     * Function to check model has files
     *
     * @return bool
     */
    public static function hasFilesData(): bool
    {
        return in_array(HasFileData::class, array_keys((new \ReflectionClass(static::class))->getTraits()));
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

}
