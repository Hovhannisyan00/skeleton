<?php

namespace App\Models\Base\Enums;

final class ShowStatus
{
    final public const ACTIVE = '1';

    final public const INACTIVE = '2';

    final public const DELETED = '0';

    final public const ALL = [
        self::ACTIVE,
        self::INACTIVE,
        self::DELETED,
    ];

    final public const FOR_SELECT = [
        self::ACTIVE,
        self::INACTIVE,
    ];
}
