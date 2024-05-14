<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Password;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Password\PasswordResetTokenVerificationRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Password\PasswordResetTokenVerificationAction;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetTokenVerificationController extends Controller
{
    public function __invoke(Customer $customer, PasswordResetTokenVerificationRequest $request): JsonResponse
    {
        // Execute the change password action
        $customer = PasswordResetTokenVerificationAction::execute(customer: $customer, request: $request->validated());

        // Return the RegistrationResource
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'The token verification is successful.',
            data: (new RegistrationResource($customer))
        );
    }
}
