<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Mobile\Registration;

use App\Http\Requests\Shared\ApiRequest;
use App\Rules\V1\Mobile\Registration\IsAccountVerifiedRule;

final class RegistrationPersonalInformationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required', new IsAccountVerifiedRule],
            'data.type' => ['required', 'string', 'in:Customer'],
            'data.attributes' => ['required'],

            'data.attributes.first_name' => ['required', 'string'],
            'data.attributes.last_name' => ['required', 'string'],

            'data.attributes.email' => ['email', 'unique:customers,email'],
            'data.attributes.password' => ['required', 'between:6,20'],

            'data.attributes.accepted_terms' => ['required', 'accepted'],
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

            'data.attributes.email.email' => 'The email address is invalid',
            'data.attributes.email.unique' => 'The email address is already taken',
            'data.attributes.password.required' => 'The password is required.',
            'data.attributes.password.between' => 'The password length must be between 6 and 20 characters.',

            'data.attributes.accepted_terms.required' => 'The accept terms is required',
            'data.attributes.accepted_terms.accepted' => 'The terms and conditions must be accepted',
        ];
    }
}
