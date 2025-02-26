<?php

declare(strict_types=1);

namespace Domain\Shared\Exceptions\Common;

use App\Common\ResponseBuilder;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class TokenExpiredExec extends Exception
{
    public function report(
    ): JsonResponse {
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_UNAUTHORIZED,
            message: 'Request invalid.',
            description: 'The token has expired. Please request a new token.'
        );
    }
}
