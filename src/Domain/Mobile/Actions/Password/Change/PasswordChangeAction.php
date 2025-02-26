<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password\Change;

use App\Common\ResponseBuilder;
use Domain\Mobile\Jobs\Password\Change\PasswordChangeJob;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Password\PasswordUpdateService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PasswordChangeAction
{
    private PasswordUpdateService $updatePasswordAction;

    public function __construct(
        PasswordUpdateService $updatePasswordAction
    ) {
        $this->updatePasswordAction = $updatePasswordAction;
    }

    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer,
        array $request
    ): JsonResponse {
        // Execute the PasswordUpdateService
        $this->updatePasswordAction->execute(
            customer: $customer,
            request: $request
        );

        // Dispatch the PasswordChangeJob
        PasswordChangeJob::dispatch(
            $customer
        );

        // Return the response
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Your have successfully changed your password.',
        );
    }
}
