<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Registration;

use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Models\Customer;
use Illuminate\Contracts\Validation\ValidationRule;

final class IsAccountPendingRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the customer data
        $status = Customer::query()->where([['phone_number', '=', $value]])->first(columns: 'status');

        // Validation conditions
        if ($status->status !== CustomerStatus::Pending->value) {
            $fail('This account is '.$status['status'].'.');
        }
    }
}
