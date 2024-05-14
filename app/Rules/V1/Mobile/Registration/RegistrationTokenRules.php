<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Registration;

use Carbon\Carbon;
use Closure;
use Domain\Mobile\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class RegistrationTokenRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer with the token
        $customer = Customer::query()->where([['phone_number', '=', $value]])->with(relations: 'token')->first();

        // Validation conditions
        if ($customer === null) {
            $fail('Invalid token or email.');
        } elseif (data_get(target: $customer, key: 'is_verified') === false) {
            $fail('The token has not been verified.');
        } elseif (data_get(target: $customer, key: 'token_expiration_date') < Carbon::now()) {
            $fail('This token has expired.');
        }
    }
}
