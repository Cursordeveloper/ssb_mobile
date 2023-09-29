<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Password;

use App\Http\Requests\Common\ApiRequest;
use App\Rules\V1\Common\CustomerActiveRule;

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

            'data.attributes.email' => ['required', 'exists:customers,email', new CustomerActiveRule()],
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
