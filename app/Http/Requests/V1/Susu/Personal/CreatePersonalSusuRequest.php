<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Susu\Personal;

use App\Http\Requests\Shared\ApiRequest;

final class CreatePersonalSusuRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Susu'],

            'data.attributes.account_name' => ['required', 'string'],
            'data.attributes.purpose' => ['required', 'string', 'max:50'],
            'data.attributes.amount' => ['required', 'integer', 'min:5'],

            'data.relationships.scheme.attributes.resource_id' => ['required', 'string', 'uuid'],
            'data.relationships.linked_account.attributes.resource_id' => ['required', 'string', 'uuid'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid.',

            'data.type.required' => 'The type is required.',
            'data.type.string' => 'The type must be of a string.',

            'data.attributes.account_name.required' => 'The account name is required.',
            'data.attributes.account_name.string' => 'The account name must be a string.',
            'data.attributes.purpose.required' => 'The purpose / description is required.',
            'data.attributes.purpose.string' => 'The purpose / description must be a string.',
            'data.attributes.purpose.max' => 'The purpose / description must not exceed 50 characters.',
            'data.attributes.amount.required' => 'The susu amount is required.',
            'data.attributes.amount.integer' => 'The susu amount must be an integer.',
            'data.attributes.amount.min' => 'The susu amount must not be less than GH₵5.',

            'data.relationships.scheme.attributes.resource_id.required' => 'The scheme resource is required.',
            'data.relationships.scheme.attributes.resource_id.string' => 'The scheme resource must be a string.',
            'data.relationships.scheme.attributes.resource_id.uuid' => 'The scheme resource must be a valid uuid.',

            'data.relationships.linked_account.attributes.resource_id.required' => 'The linked account resource is required.',
            'data.relationships.linked_account.attributes.resource_id.string' => 'The linked account resource must be a string.',
            'data.relationships.linked_account.attributes.resource_id.uuid' => 'The linked account resource must be a valid uuid.',
        ];
    }
}
