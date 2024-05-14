<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Password\PasswordResetRequestAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetRequestController extends Controller
{
    public function __invoke(PasswordRequest $request): JsonResponse
    {
        // Dispatch the PasswordResetRequestAction
        $customer = PasswordResetRequestAction::execute(request: $request->validated());

        // Return the RegistrationResource
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Request in progress. Notification will be sent shortly.',
            data: (new RegistrationResource($customer))
        );
    }
}
