<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Password\ChangePasswordRequest;
use Domain\Customer\Jobs\Password\ChangePasswordJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordChangeController extends Controller
{
    public function __invoke(ChangePasswordRequest $request): JsonResponse
    {
        // Dispatch ChangePasswordJob
        ChangePasswordJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Change password in progress. Notification will be sent shortly.',
        );
    }
}
