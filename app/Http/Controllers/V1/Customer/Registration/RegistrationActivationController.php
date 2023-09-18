<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationActivationRequest;
use Domain\Customer\Jobs\Registration\RegistrationActivationJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationActivationController extends Controller
{
    public function __invoke(RegistrationActivationRequest $request): JsonResponse
    {
        // Dispatch the AccountActivationJob
        RegistrationActivationJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Activation in progress. Notification will be sent shortly.',
        );
    }
}
