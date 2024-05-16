<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Token;

use Carbon\Carbon;
use Closure;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Models\Token;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

final class PasswordResetTokenValidationRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the customer data
        $token = Token::query()->where([['customer_id', '=', Route::input(key: 'customer')['id']]])->first();

        // Validation conditions
        if (Route::input(key: 'customer')['status'] !== CustomerStatus::Active->value) {
            $fail('This account is '.Route::input(key: 'customer')['status'].'.');
        } elseif ($token['token'] === null) {
            $fail('Invalid verification token.');
        } elseif ($token['token_expiration_date'] < Carbon::now()) {
            $fail('The verification token has expired.');
        }
    }
}
