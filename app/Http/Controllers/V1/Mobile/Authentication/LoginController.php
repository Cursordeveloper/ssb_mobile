<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Authentication\LoginRequest;
use Domain\Mobile\Actions\Authentication\LoginAction;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;

final class LoginController extends Controller
{
    /**
     * @throws SystemFailureExec
     */
    public function __invoke(
        LoginRequest $request,
        LoginAction $loginAction
    ): JsonResponse {
        // Execute the LoginAction action and return the JsonResponse
        return $loginAction->execute(
            request: $request->validated()
        );
    }
}
