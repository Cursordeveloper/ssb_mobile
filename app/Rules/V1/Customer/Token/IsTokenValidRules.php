<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Token;

use Carbon\Carbon;
use Closure;
use Domain\Customer\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class IsTokenValidRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer data
        $user = Customer::query()->where([['email', '=', $value]])->with(relations: 'token')->first();

        // Validation conditions
        if (data_get(target: $user, key: 'token') === null) {
            $fail('Invalid activation token.');
        } elseif (data_get(target: $user, key: 'token.token_expiration_date') < Carbon::now()) {
            $fail('The activation token has expired.');
        }
    }
}
