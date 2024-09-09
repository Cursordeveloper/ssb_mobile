<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Pin;

use App\Http\Requests\Shared\ApiRequest;

final class PinApprovalRequest extends ApiRequest
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
            'data.attributes.pin' => ['required', 'numeric', 'digits_between:4,4'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid.',

            'data.type.required' => 'The type is required.',
            'data.type.string' => 'The type must be of a string.',

            'data.attributes.pin.required' => 'The pin is required.',
            'data.attributes.pin.numeric' => 'The pin must be must contain numbers only.',
            'data.attributes.pin.digits_between' => 'The pin length must be 4 digits.',
        ];
    }
}
