<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Customer\Actions\Pin\RegistrationHasPinUpdateAction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationHasPinUpdateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        // Execute the CustomerUpdateAction
        $customer = RegistrationHasPinUpdateAction::execute(request: $request->all());

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'You have successfully created a PIN.',
            data: new RegistrationResource(resource: $customer),
        );
    }
}
