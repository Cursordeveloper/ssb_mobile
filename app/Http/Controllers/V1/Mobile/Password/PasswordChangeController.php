<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\ChangePasswordRequest;
use Domain\Mobile\Jobs\Password\ChangePasswordAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordChangeController extends Controller
{
    public function __invoke(
        ChangePasswordRequest $request,
    ): JsonResponse {
        // Execute the ChangePasswordAction
        ChangePasswordAction::execute(
            request: $request->validated()
        );

        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Your password has been change successfully.',
        );
    }
}
