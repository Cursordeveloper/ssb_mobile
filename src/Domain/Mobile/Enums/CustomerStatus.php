<?php

declare(strict_types=1);

namespace Domain\Mobile\Enums;

enum CustomerStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Suspended = 'suspended';
    case Blocked = 'blocked';
}
