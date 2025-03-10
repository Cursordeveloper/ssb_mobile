<?php

declare(strict_types=1);

namespace Domain\Customer\Services\Registration;

use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class CustomerByNumberService
{
    /**
     * @throws SystemFailureExec
     */
    public function execute(
        string $phone_number
    ): Customer {
        try {
            // Execute the database transaction
            return DB::transaction(function () use (
                $phone_number,
            ) {
                // Get the customer
                $customer = Customer::where(
                    column: 'phone_number',
                    operator: '=',
                    value: $phone_number
                )->first();

                // Throw the ModelNotFoundException (If $customer does not exist)
                if (! $customer) {
                    throw new ModelNotFoundException;
                }

                // Return the customer
                return $customer;
            });
        } catch (Throwable $throwable) {
            // Log the full exception with context
            Log::error('Exception in CustomerByNumberService', [
                'phone_number' => $phone_number,
                'exception' => [
                    'message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                ],
            ]);

            // Throw the SystemFailureExec
            throw new SystemFailureExec;
        }
    }
}
