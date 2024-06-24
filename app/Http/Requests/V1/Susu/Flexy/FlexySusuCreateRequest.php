<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Susu\Flexy;

use App\Http\Requests\Shared\ApiRequest;

final class FlexySusuCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:FlexySusu'],

            'data.attributes' => ['required'],

            'data.attributes.account_name' => ['required', 'string'],

//            'data.attributes.min_amount' => ['required', 'numeric', 'gt:4.99'],
//            'data.attributes.max_amount' => ['required', 'numeric', 'gt:4.99'],

            'data.attributes.recurring_debit' => ['bool'],

            'data.relationships.linked_account.attributes.resource_id' => ['required', 'uuid'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid.',

            'data.type.required' => 'The type is required.',
            'data.type.string' => 'The type must be of a string.',
            'data.type.in' => 'The type is invalid.',

            'data.attributes.required' => 'The attributes is required.',

            'data.attributes.account_name.required' => 'The account name is required.',
            'data.attributes.account_name.string' => 'The account name must be of a string.',

//            'data.attributes.min_amount.required' => 'The minimum amount is required.',
//            'data.attributes.min_amount.gt' => 'The minimum amount cannot be less than GHS5.00.',
//            'data.attributes.max_amount.required' => 'The maximum amount is required.',
//            'data.attributes.max_amount.gt' => 'The maximum amount cannot be less than GHS5.00.',

            'data.attributes.recurring_debit' => 'The recurring debit must be of a boolean type.',

            'data.relationships.linked_account.attributes.resource_id.required' => 'The linked account resource id is required.',
            'data.relationships.linked_account.attributes.resource_id.uuid' => 'The linked account resource id is invalid.',
        ];
    }
}
