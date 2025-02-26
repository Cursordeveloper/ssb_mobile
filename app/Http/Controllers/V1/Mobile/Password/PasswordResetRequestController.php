<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordRequest;
use Domain\Mobile\Actions\Password\Reset\PasswordResetRequestAction;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;

final class PasswordResetRequestController extends Controller
{
    /**
     * @throws SystemFailureExec
     */
    public function __invoke(
        PasswordRequest $request,
        PasswordResetRequestAction $passwordResetRequestAction
    ): JsonResponse {
        // Dispatch the PasswordResetRequestAction and return the JsonResponse
        return $passwordResetRequestAction->execute(
            request: $request->validated()
        );
    }
}
