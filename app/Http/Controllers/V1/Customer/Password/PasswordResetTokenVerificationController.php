<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Password\PasswordResetTokenVerificationRequest;
use Domain\Customer\Actions\Password\PasswordResetTokenVerification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetTokenVerificationController extends Controller
{
    public function __invoke(PasswordResetTokenVerificationRequest $request): JsonResponse
    {
        // Execute the change password action
        $verified = PasswordResetTokenVerification::execute(
            request: $request->validated()
        );

        if ($verified) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_OK,
                message: 'Request successful.',
                description: 'The token verification is successful.',
            );
        }

        // Return the resourceResponseBuilder in JsonResponse
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_SERVICE_UNAVAILABLE,
            message: 'Request aborted.',
            description: 'There was a problem verifying the token. Try again later.',
        );
    }
}
