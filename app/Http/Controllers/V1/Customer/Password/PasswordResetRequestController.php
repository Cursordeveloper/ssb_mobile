<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Password\PasswordRequest;
use Domain\Customer\Jobs\Password\PasswordResetRequestJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetRequestController extends Controller
{
    public function __invoke(PasswordRequest $request): JsonResponse
    {
        // Dispatch the PasswordResetRequestJob
        PasswordResetRequestJob::dispatch(
            request: $request->validated()
        );

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Request in progress. Notification will be sent shortly.',
        );
    }
}
