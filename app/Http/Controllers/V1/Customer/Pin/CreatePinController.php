<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Pin;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\CreatePinRequest;
use Domain\Customer\Actions\Pin\CreatePinAction;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreatePinController extends Controller
{
    public function __invoke(CreatePinRequest $request): JsonResponse
    {
        // Execute the
        return CreatePinAction::execute(request: $request->validated());

        // Dispatch the CreatePinJob
//        CreatePinJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
//        return ResponseBuilder::resourcesResponseBuilder(
//            status: true,
//            code: Response::HTTP_ACCEPTED,
//            message: 'Request accepted.',
//            description: 'Pin setup in progress. Notification will be sent shortly.',
//        );
    }
}
