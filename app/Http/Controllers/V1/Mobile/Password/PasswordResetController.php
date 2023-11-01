<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetRequest;
use Domain\Mobile\Actions\Password\PasswordResetAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetController extends Controller
{
    public function __invoke(
        PasswordResetRequest $request,
    ): JsonResponse {
        // Execute the PasswordResetAction
        PasswordResetAction::execute(
            request: $request->validated(),
        );

        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Password has been reset successfully.',
        );
    }
}
