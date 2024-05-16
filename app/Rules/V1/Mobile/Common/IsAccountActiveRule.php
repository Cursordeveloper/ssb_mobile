<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Common;

use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class IsAccountActiveRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer data
        $status = Customer::query()->where([['phone_number', '=', $value]])->first(columns: 'status');

        // Validation conditions
        if (empty($status)) {
            $fail('The account does not exist');
        } elseif (data_get(target: $status, key: 'status') !== CustomerStatus::Active->value) {
            $fail('This account is '.$status['status'].'.');
        }
    }
}
