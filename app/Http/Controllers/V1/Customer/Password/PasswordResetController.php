<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Password\PasswordResetRequest;
use Domain\Customer\Actions\Password\PasswordReset;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetController extends Controller
{
    public function __invoke(PasswordResetRequest $request): JsonResponse
    {
        // Dispatch PasswordReset job
        $password_reset = PasswordReset::execute(
            request: $request->validated()
        );

        if ($password_reset) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_OK,
                message: 'Request successful.',
                description: 'Password has been reset successfully.',
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
