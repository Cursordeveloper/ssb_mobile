<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationNewTokenRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Registration\RegistrationNewTokenAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationNewTokenController extends Controller
{
    public function __invoke(RegistrationNewTokenRequest $request): JsonResponse
    {
        // Execute the RegistrationNewTokenAction
        $customer = RegistrationNewTokenAction::execute(request: $request->validated());

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'New token request in progress. Notification will be sent shortly.',
            data: new RegistrationResource($customer),
        );
    }
}
