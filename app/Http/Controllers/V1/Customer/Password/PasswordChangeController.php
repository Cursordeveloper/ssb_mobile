<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Password\ChangePasswordRequest;
use Domain\Customer\Jobs\Password\ChangePassword;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordChangeController extends Controller
{
    public function __invoke(ChangePasswordRequest $request): JsonResponse
    {
        $change_password = ChangePassword::execute(
            request: $request->validated()
        );

        if ($change_password) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_OK,
                message: 'Request successful.',
                description: 'Your password has been change successfully.',
            );
        }
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_SERVICE_UNAVAILABLE,
            message: 'Request aborted.',
            description: 'There was a problem. Try again later.',
        );
    }
}
