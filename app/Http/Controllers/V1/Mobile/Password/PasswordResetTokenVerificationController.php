<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetTokenVerificationRequest;
use Domain\Mobile\Actions\Password\Reset\PasswordResetTokenVerificationAction;
use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;

final class PasswordResetTokenVerificationController extends Controller
{
    /**
     * @throws SystemFailureExec
     */
    public function __invoke(
        Customer $customer,
        PasswordResetTokenVerificationRequest $request,
        PasswordResetTokenVerificationAction $passwordResetTokenVerificationAction
    ): JsonResponse {
        // Execute the PasswordResetTokenVerificationAction and return the JsonResponse
        return $passwordResetTokenVerificationAction->execute(
            customer: $customer,
            request: $request->validated()
        );
    }
}
