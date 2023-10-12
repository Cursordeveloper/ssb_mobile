<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Password;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Customer\Password\ResetPasswordRules;

final class PasswordResetRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Password'],

            'data.attributes.email' => ['required', 'exists:customers,email', new ResetPasswordRules()],
            'data.attributes.password' => ['required', 'between:6,20', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.email.required' => 'The email is required.',
            'data.attributes.email.exists' => 'The email is invalid.',

            'data.attributes.password.required' => 'The password is required.',
            'data.attributes.password.between' => 'The password length must be between 6 and 20 characters.',
            'data.attributes.password.confirmed' => 'The passwords do not match.',
        ];
    }
}
