<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Susu\GoalGetter;

use App\Http\Requests\Shared\ApiRequest;

final class GoalGetterSusuCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:GoalGetterSusu'],

            'data.attributes' => ['required'],

            'data.attributes.account_name' => ['required', 'string'],
            'data.attributes.target_amount' => ['required'],

            'data.attributes.start_date' => ['required'],
            'data.attributes.duration' => ['required'],
            'data.attributes.frequency' => ['required'],

            'data.relationships.linked_account.attributes.resource_id' => ['required'],
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
            'data.attributes.target_amount.required' => 'The target amount is required.',

            'data.attributes.start_date.required' => 'The start date is required.',

            'data.attributes.duration.required' => 'The duration is required.',

            'data.attributes.frequency.required' => 'The frequency is required.',

            'data.relationships.linked_account.attributes.resource_id.required' => 'The linked account resource id is required.',
        ];
    }
}
