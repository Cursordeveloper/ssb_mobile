<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Customer\LinkedAccount;

use App\Http\Requests\Shared\ApiRequest;

final class LinkAccountRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:LinkedAccount'],

            'data.attributes.account_number' => ['required'],
            'data.relationships.scheme.attributes.resource_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.account_number.require' => 'The account number is required.',
            'data.relationships.account_type.attributes.resource_id.require' => 'The resource id is required.',
        ];
    }
}
