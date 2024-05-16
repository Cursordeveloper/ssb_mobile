<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\Kyc;

use App\Http\Requests\Shared\ApiRequest;

final class KycVerificationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Kyc'],

            'data.attributes.id_number' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid.',

            'data.attributes.id_number.required' => 'The id number is required.',
        ];
    }
}
