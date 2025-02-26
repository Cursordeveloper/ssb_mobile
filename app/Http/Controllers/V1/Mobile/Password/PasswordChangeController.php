<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\ChangePasswordRequest;
use Domain\Mobile\Actions\Password\Change\PasswordChangeAction;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;

final class PasswordChangeController extends Controller
{
    /**
     * @throws SystemFailureExec
     */
    public function __invoke(
        ChangePasswordRequest $request,
        PasswordChangeAction $passwordChangeAction
    ): JsonResponse {
        // Execute the PasswordChangeAction
        return $passwordChangeAction->execute(
            customer: auth()->user(),
            request: $request->validated()
        );
    }
}
