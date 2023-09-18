<?php

declare(strict_types=1);

namespace App\Rules\V1\Customer\Pin;

use Closure;
use Domain\Customer\Models\Pin;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

final class ChangePinRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the Pin model with the customer login id
        $pin = Pin::query()->where(column: 'customer_id', operator: '=', value: auth()->user()['id'])->first();

        if (! Hash::check($value, $pin['pin'])) {
            // Increase attempt
            $this->attempts();

            $fail('The current pin provided is incorrect.');
        } elseif ($value === request()->input(key: 'data.attributes.pin')) {
            $fail('The current and the new pin cannot be the same.');
        }
    }
}
