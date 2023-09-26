<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Authentication;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Authentication\LoginRequest;
use App\Http\Resources\V1\Customer\Authentication\AuthenticationResource;
use Domain\Customer\Actions\Authentication\LoginAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginAction $action): JsonResponse
    {
        // Execute the login action and return the resource
        $token = $action->execute(data: $request->validated());

        // Return loin successful authentication
        return ResponseBuilder::tokenResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Login successful.',
            token: respondWithToken($token)->original,
            user: new AuthenticationResource(auth()->guard(name: 'customer')->user()),
        );
    }
}
