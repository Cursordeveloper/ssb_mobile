<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Pin;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class PinChangeRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === request()->input(key: 'data.attributes.pin')) {
            $fail('The current and the new pin cannot be the same.');
        }
    }
}
