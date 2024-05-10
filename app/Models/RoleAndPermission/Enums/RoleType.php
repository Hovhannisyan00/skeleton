<?php

namespace App\Models\RoleAndPermission\Enums;

final class RoleType
{
    final public const ADMIN = 'admin';

    final public const USER = 'user';

    final public const ALL = [
        self::ADMIN,
        self::USER,
    ];
}
