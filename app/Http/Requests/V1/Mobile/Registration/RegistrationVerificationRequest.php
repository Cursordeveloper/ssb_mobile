<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;

final class RegistrationVerificationRequest extends ApiRequest
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

            'data.attributes.phone_number' => ['required', 'min:10', 'unique:customers,phone_number', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',
            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid',
            'data.attributes' => 'The attributes field is required.',

            'data.attributes.phone_number.required' => 'The phone number is required',
            'data.attributes.phone_number.min' => 'The phone number must not be less than 10 digits',
            'data.attributes.phone_number.unique' => 'The phone number is already taken',
            'data.attributes.phone_number.regex' => 'The phone number is invalid.',
        ];
    }
}
