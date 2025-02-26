<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetRequest;
use Domain\Mobile\Actions\Password\Reset\PasswordResetAction;
use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;

final class PasswordResetController extends Controller
{
    /**
     * @throws SystemFailureExec
     */
    public function __invoke(
        Customer $customer,
        PasswordResetRequest $request,
        PasswordResetAction $passwordResetAction
    ): JsonResponse {
        // Execute the PasswordResetAction and return the JsonResponse
        return $passwordResetAction->execute(
            customer: $customer,
            request: $request->validated()
        );
    }
}
