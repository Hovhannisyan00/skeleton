<?php

namespace App\Models\File\Enums;

final class FileType
{
    final public const IMAGE = 'image';

    final public const FILE = 'file';

    final public const ALL = [
        self::IMAGE,
        self::FILE,
    ];
}
