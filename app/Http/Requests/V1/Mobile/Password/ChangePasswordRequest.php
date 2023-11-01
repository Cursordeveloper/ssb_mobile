<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Password;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Authentication\AuthenticatedCustomerStatusRule;
use App\Rules\V1\Mobile\Password\ChangePasswordRules;

final class ChangePasswordRequest extends ApiRequest
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

            'data.attributes.current_password' => ['required', new AuthenticatedCustomerStatusRule(), new ChangePasswordRules()],
            'data.attributes.password' => ['required', 'between:6,20', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.current_password.required' => 'The current password is required',

            'data.attributes.password.required' => 'The new password is required',
            'data.attributes.password.between' => 'The new password must be between 6 and 20 characters',
            'data.attributes.password.confirmed' => 'The new password confirmation does not match',
        ];
    }
}
