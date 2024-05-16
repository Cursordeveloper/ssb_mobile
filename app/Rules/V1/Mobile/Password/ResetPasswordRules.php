<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Password;

use Closure;
use Domain\Mobile\Models\Token;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

final class ResetPasswordRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the customer token data
        $token = Token::query()->where([['customer_id', '=', Route::input(key: 'customer')['id']]])->first();

        // Validation conditions
        if (empty($token)) {
            $fail('There is no password reset record for this email.');
        } elseif (data_get(target: $token, key: 'is_verified') === false) {
            $fail('The token is not verified.');
        }
    }
}
