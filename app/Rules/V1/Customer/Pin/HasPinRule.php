<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Pin;

use Closure;
use Domain\Customer\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class HasPinRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer pin data
        $pin = Customer::query()->where([['email', '=', $value]])->first(columns: 'has_pin');

        // Validation conditions
        if (data_get(target: $pin, key: 'has_pin') === false) {
            $fail('You have not setup your pin.');
        }
    }
}
