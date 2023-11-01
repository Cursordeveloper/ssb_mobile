<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationActivationRequest;
use Domain\Mobile\Actions\Registration\RegistrationActivationAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationActivationController extends Controller
{
    public function __invoke(
        RegistrationActivationRequest $request,
    ): JsonResponse {
        // Activate the customer account account
        $customer = RegistrationActivationAction::execute(
            request: $request->validated(),
        );

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request accepted.',
            description: 'Activation in progress. Notification will be sent shortly.',
            data: $customer,
        );
    }
}
