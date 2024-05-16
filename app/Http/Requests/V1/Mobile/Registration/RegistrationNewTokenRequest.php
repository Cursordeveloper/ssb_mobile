<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Registration\IsAccountPendingRule;

final class RegistrationNewTokenRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Customer'],
            'data.attributes' => ['required'],

            'data.attributes.phone_number' => ['required', 'exists:customers,phone_number', new IsAccountPendingRule],
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

            'data.attributes.phone_number.required' => 'The phone number is required.',
            'data.attributes.phone_number.exists' => 'The phone number does not exist.',
        ];
    }
}
