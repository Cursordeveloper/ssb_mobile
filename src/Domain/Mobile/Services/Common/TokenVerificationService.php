<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Common;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class TokenVerificationService
{
    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer,
        string $token
    ): ?bool {
        try {
            // Execute the database transaction
            return DB::transaction(function () use (
                $customer,
                $token
            ) {
                // Get the customer token
                $token = Token::where(
                    column: 'customer_id',
                    operator: '=',
                    value: $customer->id
                )->where(
                    column: 'token',
                    operator: '=',
                    value: $token
                )->first();

                // Update the token (is_verified) status
                return $token->update([
                    'is_verified' => true,
                ]);
            });
        } catch (Throwable $throwable) {
            // Log the full exception with context
            Log::error('Exception in TokenVerificationService', [
                'customer' => $customer,
                'token' => $token,
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
