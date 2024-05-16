<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Password\PasswordResetAction;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetController extends Controller
{
    public function __invoke(Customer $customer, PasswordResetRequest $request): JsonResponse
    {
        // Execute the PasswordResetAction
        $customer = PasswordResetAction::execute(customer: $customer, request: $request->validated());

        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Password has been reset successfully.',
            data: (new RegistrationResource($customer)),
        );
    }
}
