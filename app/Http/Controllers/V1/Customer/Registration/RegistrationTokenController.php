<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationTokenRequest;
use Domain\Customer\Jobs\Registration\RegistrationTokenJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationTokenController extends Controller
{
    public function __invoke(RegistrationTokenRequest $request): JsonResponse
    {
        // Dispatch RegistrationTokenJob
        RegistrationTokenJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Token request in progress. Notification will be sent shortly.',
        );
    }
}
