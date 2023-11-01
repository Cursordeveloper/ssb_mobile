<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Authentication;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Customer\Pin\HasPinRule;
use App\Rules\V1\Mobile\Authentication\UnauthenticatedCustomerStatusRule;

final class LoginRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required', 'array'],
            'data.type' => ['required', 'in:Customers'],

            'data.attributes.email' => ['required', 'email', new UnauthenticatedCustomerStatusRule(), new HasPinRule()],
            'data.attributes.password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid',

            'data.attributes.email.required' => 'The email is required',
            'data.attributes.email.email' => 'The email address is invalid',

            'data.attributes.password.required' => 'The password is required',
        ];
    }
}
