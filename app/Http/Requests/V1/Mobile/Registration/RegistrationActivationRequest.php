<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Token\RegistrationTokenValidationRules;

final class RegistrationActivationRequest extends ApiRequest
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

            'data.attributes.token' => ['required', 'exists:tokens,token', new RegistrationTokenValidationRules],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid.',

            'data.attributes' => 'The attributes field is required.',

            'data.attributes.token.required' => 'The token is required.',
            'data.attributes.token.exists' => 'The token does not exist.',
        ];
    }
}
