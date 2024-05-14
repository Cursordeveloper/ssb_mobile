<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Susu\Biz;

use App\Http\Requests\Shared\ApiRequest;

final class BizSusuCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:BizSusu'],
            'data.attributes' => ['required'],

            'data.attributes.account_name' => ['required', 'string'],
            'data.attributes.susu_amount' => ['required', 'numeric', 'gt:4.99'],

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

            'data.attributes.susu_amount.required' => 'The susu amount is required.',
            'data.attributes.susu_amount.numeric' => 'The susu amount field must be a number.',
            'data.attributes.susu_amount.gt' => 'The minimum contribution start from GHS5.00 and above.',

            'data.attributes.recurring_debit' => 'The recurring debit must be of a boolean type.',

            'data.relationships.linked_account.attributes.resource_id.required' => 'The linked account resource id is required.',
            'data.relationships.linked_account.attributes.resource_id.uuid' => 'The linked account resource id is invalid.',
        ];
    }
}
