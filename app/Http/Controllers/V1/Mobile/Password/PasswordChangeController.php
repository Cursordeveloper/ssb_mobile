<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\ChangePasswordRequest;
use Domain\Mobile\Jobs\Password\PasswordChangeAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordChangeController extends Controller
{
    public function __invoke(ChangePasswordRequest $request): JsonResponse
    {
        // Execute the PasswordChangeAction
        PasswordChangeAction::execute(customer: auth()->user(), request: $request->validated());

        // Return the response
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Your have successfully changed your password.',
        );
    }
}
