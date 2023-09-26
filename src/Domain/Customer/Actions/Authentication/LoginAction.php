<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Authentication;

use App\Common\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LoginAction
{
    public function execute(array $data): bool|JsonResponse
    {
        // Attempt login
        $token = auth()
            ->guard(name: 'customer')
            ->attempt(data_get(target: $data, key: 'data.attributes'));

        // Login status conditional
        if (! $token) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNAUTHORIZED,
                message: 'Authentication failed.',
                description: 'Incorrect email or password.',
            );
        }
        return $token;
    }
}
