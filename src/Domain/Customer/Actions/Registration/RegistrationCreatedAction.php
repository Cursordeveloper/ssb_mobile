<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Registration;

use Domain\Mobile\Services\Registration\RegistrationCreatedService;
use Throwable;

final class RegistrationCreatedAction
{
    public static function execute(array $data): bool
    {
        try {
            return RegistrationCreatedService::execute(data: $data);
        } catch (Throwable $throwable) {
            return false;
        }
    }
}
