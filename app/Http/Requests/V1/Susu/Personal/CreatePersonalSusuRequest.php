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
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
        ];
    }
}
