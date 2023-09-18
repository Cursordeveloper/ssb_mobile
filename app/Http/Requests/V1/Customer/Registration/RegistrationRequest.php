<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Registration;

use App\Http\Requests\Common\ApiRequest;

final class RegistrationRequest extends ApiRequest
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

            'data.attributes.first_name' => ['required', 'string'],
            'data.attributes.last_name' => ['required', 'string'],
            'data.attributes.phone_number' => ['required', 'min:10', 'unique:customers,phone_number', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'data.attributes.email' => ['required', 'email', 'unique:customers,email'],
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

            'data.attributes.first_name.required' => 'The first name is required',
            'data.attributes.first_name.string' => 'The first name must be a string type',
            'data.attributes.last_name.required' => 'The last name is required',
            'data.attributes.last_name.string' => 'The last name must be a string type',
            'data.attributes.phone_number.required' => 'The phone number is required',
            'data.attributes.phone_number.min' => 'The phone number must not be less than 10 digits',
            'data.attributes.phone_number.unique' => 'The phone number is already taken',
            'data.attributes.phone_number.regex' => 'The phone number is invalid.',
            'data.attributes.email.required' => 'The email is required',
            'data.attributes.email.email' => 'The email address is invalid',
            'data.attributes.email.unique' => 'The email address is already taken',
            'data.attributes.password.required' => 'The password is required.',
            'data.attributes.password.between' => 'The password length must be between 6 and 20 characters.',
        ];
    }
}
