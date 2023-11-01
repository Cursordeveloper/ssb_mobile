<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Password;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Authentication\UnauthenticatedCustomerStatusRule;

final class PasswordRequest extends ApiRequest
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

            'data.attributes.email' => ['required', 'exists:customers,email', new UnauthenticatedCustomerStatusRule()],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.email.required' => 'The email is required.',
            'data.attributes.email.exists' => 'The email does not exist.',
        ];
    }
}
