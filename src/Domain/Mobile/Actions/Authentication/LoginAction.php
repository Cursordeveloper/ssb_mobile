<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Authentication;

use App\Common\Helpers;
use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Authentication\AuthenticationResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LoginAction
{
    public static function execute(array $request): JsonResponse
    {
        // Attempt login
        $token = auth()
            ->guard(name: 'customer')
            ->attempt(data_get(target: $request, key: 'data.attributes'));

        // Login status conditional
        if (! $token) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNAUTHORIZED,
                message: 'Authentication failed.',
                description: 'Incorrect email or password.',
            );
        }
        return ResponseBuilder::tokenResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Login successful.',
            token: Helpers::RespondWithToken($token)->original,
            user: new AuthenticationResource(auth()->guard(name: 'customer')->user()),
        );
    }
}
