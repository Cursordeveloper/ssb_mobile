<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Pin;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

final class CreatePinRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validation conditions
        if (Route::input(key: 'customer')['has_pin'] === true) {
            $fail('You have already created your pin.');
        }
    }
}
