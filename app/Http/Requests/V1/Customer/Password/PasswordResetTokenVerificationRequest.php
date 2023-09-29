<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Password;

use App\Http\Requests\Common\ApiRequest;
use App\Rules\V1\Common\CustomerActiveRule;
use App\Rules\V1\Customer\Token\IsTokenValidRules;

final class PasswordResetTokenVerificationRequest extends ApiRequest
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

            'data.attributes.email' => ['required', 'exists:customers,email', new CustomerActiveRule(), new IsTokenValidRules()],
            'data.attributes.token' => ['required', 'exists:tokens,token'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.email.required' => 'The email is required',
            'data.attributes.email.exists' => 'The email does not exist',

            'data.attributes.token.required' => 'The token is required',
            'data.attributes.token.exists' => 'The token does not exist',
        ];
    }
}
