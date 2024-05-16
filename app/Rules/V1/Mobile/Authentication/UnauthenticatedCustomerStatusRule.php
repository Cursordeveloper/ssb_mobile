<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Authentication;

use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

final class UnauthenticatedCustomerStatusRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validation conditions
        if (Route::input(key: 'customer')['status'] !== CustomerStatus::Active->value) {
            $fail('This account is '.Route::input(key: 'customer')['status'].'.');
        }
    }
}
