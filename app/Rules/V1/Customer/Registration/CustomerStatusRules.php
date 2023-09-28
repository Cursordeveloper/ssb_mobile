<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Registration;

use Closure;
use Domain\Customer\Enums\CustomerStatus;
use Domain\Customer\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class CustomerStatusRules implements ValidationRule
{
    /**
     * @phpcsSuppress $attribute
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer data
        $status = Customer::query()->where([['email', '=', $value]])->first(columns: 'status');

        // Validation conditions
        if (data_get(target: $status, key: 'status') !== CustomerStatus::Pending->value) {
            $fail('This account is '.$status['status'].'.');
        }
    }
}
