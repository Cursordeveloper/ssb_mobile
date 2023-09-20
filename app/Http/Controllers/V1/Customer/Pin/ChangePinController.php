<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Pin;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\ChangePinRequest;
use Domain\Customer\Jobs\Pin\ChangePinJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ChangePinController extends Controller
{
    public function __invoke(ChangePinRequest $request): JsonResponse
    {
        // Dispatch the ChangePinJob
        ChangePinJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Pin change in progress. Notification will be sent shortly.',
        );
    }
}
