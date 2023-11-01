<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Password;

use Closure;
use Domain\Mobile\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class ResetPasswordRules implements ValidationRule
{
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail,
    ): void {
        // Fetch the customer with the token
        $token = Customer::query()
            ->where([['email', '=', $value]])
            ->with(relations: 'token')
            ->first();

        // Validation conditions
        if (data_get(target: $token, key: 'token') === null) {
            $fail('There is no password reset record for this email.');
        } elseif (data_get(target: $token, key: 'is_verified') === false) {
            $fail('The token is not verified.');
        }
    }
}
