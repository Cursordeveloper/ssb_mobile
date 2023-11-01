<?php

declare(strict_types=1);

namespace App\Rules\V1\Mobile\Password;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

final class ChangePasswordRules implements ValidationRule
{
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail,
    ): void {
        if (! Hash::check($value, auth()->user()['password'])) {
            $fail('The current password provided is incorrect.');
        } elseif ($value === request()->input(key: 'data.attributes.password')) {
            $fail('The current and the new password cannot be the same.');
        }
    }
}
