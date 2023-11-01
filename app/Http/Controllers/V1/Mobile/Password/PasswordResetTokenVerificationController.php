<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetTokenVerificationRequest;
use Domain\Mobile\Actions\Password\PasswordResetTokenVerification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetTokenVerificationController extends Controller
{
    public function __invoke(
        PasswordResetTokenVerificationRequest $request,
    ): JsonResponse {
        // Execute the change password action
        PasswordResetTokenVerification::execute(
            request: $request->validated(),
        );

        // Return the resourceResponseBuilder in JsonResponse
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'The token verification is successful.',
        );
    }
}
