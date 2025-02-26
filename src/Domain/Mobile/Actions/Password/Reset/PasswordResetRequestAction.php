<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password\Reset;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Customer\Services\Registration\CustomerByNumberService;
use Domain\Mobile\Jobs\Password\Reset\PasswordResetRequestJob;
use Domain\Mobile\Services\Common\TokenGeneratorService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetRequestAction
{
    private CustomerByNumberService $customerByNumberService;
    private TokenGeneratorService $tokenGeneratorService;

    public function __construct(
        CustomerByNumberService $customerByNumberService,
        TokenGeneratorService $tokenGeneratorService,
    ) {
        $this->customerByNumberService = $customerByNumberService;
        $this->tokenGeneratorService = $tokenGeneratorService;
    }

    /**
     * @throws SystemFailureExec
     */
    public function execute(
        array $request
    ): JsonResponse {
        // Execute the CustomerByNumberService and return Customer
        $customer = $this->customerByNumberService->execute(
            phone_number: data_get(
                $request,
                key: 'data.attributes.phone_number'
            )
        );

        // Execute the TokenGeneratorService and return the token
        $token = $this->tokenGeneratorService->execute(
            customer: $customer
        );

        // Dispatch the PasswordResetRequestJob
        PasswordResetRequestJob::dispatch(
            $customer,
            $token
        );

        // Return the RegistrationResource
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Request in progress. Notification will be sent shortly.',
            data: (new RegistrationResource($customer))
        );
    }
}
