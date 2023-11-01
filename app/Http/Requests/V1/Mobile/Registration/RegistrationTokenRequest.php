<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Registration\CustomerStatusRules;

final class RegistrationTokenRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Token'],

            'data.attributes' => ['required'],
            'data.attributes.email' => ['required', 'exists:customers,email', new CustomerStatusRules()],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid.',

            'data.type.required' => 'The type is required.',
            'data.type.string' => 'The type must be of a string.',
            'data.type.in' => 'The type is invalid.',

            'data.attributes' => 'The attributes field is required.',

            'data.attributes.email.required' => 'The email is required.',
            'data.attributes.email.exists' => 'The email does not exist.',
        ];
    }
}
