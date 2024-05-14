<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Authentication;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Common\IsAccountActiveRule;

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

            'data.attributes.phone_number' => ['required', 'exists:customers,phone_number', 'regex:/^([0-9\s\-\+\(\)]*)$/', new IsAccountActiveRule],
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

            'data.attributes.phone_number.required' => 'The phone number is required.',
            'data.attributes.phone_number.exists' => 'The phone number does not exist.',
            'data.attributes.phone_number.regex' => 'The phone number is invalid.',

            'data.attributes.password.required' => 'The password is required',
        ];
    }
}
