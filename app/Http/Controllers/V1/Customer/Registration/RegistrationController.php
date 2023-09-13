<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationRequest;
use Domain\Customer\Jobs\Registration\RegistrationJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        // Dispatch RegistrationJob
        RegistrationJob::dispatch(request: $request->validated());

        // Dispatch customerCreatedEvent
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Registration in progress. You will be notified shortly.',
        );
    }
}
