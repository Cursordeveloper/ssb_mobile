<?php

declare(strict_types=1);

namespace Domain\Shared\Exceptions\Registration;

use App\Common\ResponseBuilder;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class SystemFailureExec extends Exception
{
    public function report(): JsonResponse
    {
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_SERVICE_UNAVAILABLE,
            message: 'Request unavailable.',
            description: 'Service is unavailable, please retry again later.'
        );
    }
}
