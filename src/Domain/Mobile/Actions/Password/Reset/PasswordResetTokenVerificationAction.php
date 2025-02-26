<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password\Reset;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Common\TokenVerificationService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetTokenVerificationAction
{
    private TokenVerificationService $tokenVerificationService;

    public function __construct(
        TokenVerificationService $tokenVerificationService
    ) {
        $this->tokenVerificationService = $tokenVerificationService;
    }

    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer,
        array $request
    ): JsonResponse {
        // Execute the TokenVerificationService
        $this->tokenVerificationService->execute(
            customer: $customer,
            token: data_get(
                $request,
                key: 'data.attributes.token'
            )
        );

        // Return the JsonResponse
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'The token verification is successful.',
            data: (new RegistrationResource($customer))
        );
    }
}
