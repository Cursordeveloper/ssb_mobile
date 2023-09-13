<?php

declare(strict_types=1);

namespace App\Http\Requests\Common;

use App\Common\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ResponseBuilder::unprocessableEntityResponseBuilder(
            status: false,
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
            message: 'Request unprocessable.',
            description: 'The request is invalid. Check it and try again.',
            error: $validator->errors()->all()
        ));
    }
}
