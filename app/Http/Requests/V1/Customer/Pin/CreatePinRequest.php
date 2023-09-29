<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Pin;

use App\Http\Requests\Common\ApiRequest;
use App\Rules\V1\Common\UnauthenticatedCustomerStatusRule;
use App\Rules\V1\Customer\Pin\CreatePinRule;

final class CreatePinRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Pins'],

            'data.attributes.email' => ['required', 'exists:customers,email', new UnauthenticatedCustomerStatusRule(), new CreatePinRule()],
            'data.attributes.pin' => ['required', 'integer', 'digits_between:4,4', 'confirmed'],
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

            'data.attributes.pin.required' => 'The pin is required.',
            'data.attributes.pin.integer' => 'The pin must be an integer.',
            'data.attributes.pin.digits_between' => 'The pin length must be 4 digits.',
            'data.attributes.pin.confirmed' => 'The pin confirmation does not match',
        ];
    }
}
