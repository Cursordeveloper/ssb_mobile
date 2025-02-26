<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Jobs\Tokens\DeleteTokenJob;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationTokenVerificationAction
{
    public function execute(
        Customer $customer,
        array $request
    ): JsonResponse {
        // Update the customer status to active
        $customer->update(['status' => CustomerStatus::Verified->value]);

        // Dispatch the DeleteTokenJob
        DeleteTokenJob::dispatch(
            $customer
        );

        // Return the JsonResponse
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Registration token has been verified successfully.',
            data: new RegistrationResource(
                $customer
            ),
        );
    }
}
