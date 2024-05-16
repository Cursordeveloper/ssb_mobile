<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Registration;

use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

final class IsAccountVerifiedRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validation conditions
        if (Route::input(key: 'customer')['status'] !== CustomerStatus::Verified->value) {
            $fail('This account is not verified.');
        }
    }
}
