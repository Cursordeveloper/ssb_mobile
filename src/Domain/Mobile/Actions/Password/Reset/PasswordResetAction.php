<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password\Reset;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Jobs\Password\Reset\PasswordResetJob;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Password\PasswordUpdateService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordResetAction
{
    private PasswordUpdateService $passwordUpdateService;

    public function __construct(
        PasswordUpdateService $passwordUpdateService
    ) {
        $this->passwordUpdateService = $passwordUpdateService;
    }

    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer,
        array $request
    ): JsonResponse {
        // Execute the ChangePasswordAction
        $this->passwordUpdateService->execute(
            customer: $customer,
            request: $request
        );

        // Dispatch the PasswordResetJob
        PasswordResetJob::dispatch(
            $customer
        );

        // Return the JsonResponse
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Password has been reset successfully.',
            data: (new RegistrationResource($customer)),
        );
    }
}
