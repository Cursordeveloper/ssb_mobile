<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;

final class RegistrationPasswordCreationRequest extends ApiRequest
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

            'data.attributes.email' => ['email', 'unique:customers,email'],
            'data.attributes.password' => ['required', 'between:6,20'],
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

            'data.attributes.email.email' => 'The email address is invalid',
            'data.attributes.email.unique' => 'The email address is already taken',

            'data.attributes.password.required' => 'The password is required.',
            'data.attributes.password.between' => 'The password length must be between 6 and 20 characters.',
        ];
    }
}
