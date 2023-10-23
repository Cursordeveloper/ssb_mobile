<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Pin;

use App\Http\Requests\Shared\ApiRequest;

final class ChangePinRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Pin'],

            'data.attributes.current_pin' => ['required'],
            'data.attributes.pin' => ['required', 'integer', 'digits_between:4,4', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.current_pin.required' => 'The current pin is required',

            'data.attributes.pin.required' => 'The pin is required.',
            'data.attributes.pin.integer' => 'The pin must be an integer.',
            'data.attributes.pin.digits_between' => 'The pin length must be 4 digits.',
            'data.attributes.pin.confirmed' => 'The pin confirmation does not match',
        ];
    }
}
