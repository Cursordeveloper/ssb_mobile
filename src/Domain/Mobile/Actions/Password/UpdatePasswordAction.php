<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Models\Customer;
use Exception;
use Illuminate\Support\Facades\Hash;

final class UpdatePasswordAction
{
    public static function execute(Customer $customer, array $request): void
    {
        // Update the password
        $customer->password = Hash::make(value: data_get(target: $request, key: 'data.attributes.password'));
        $password_reset = $customer->save();

        // Return PasswordResetException
        if (! $password_reset) {
            throw new Exception(message: 'Cannot update password.');
        }
    }
}
