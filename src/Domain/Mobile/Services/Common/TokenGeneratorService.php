<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Common;

use App\Common\Helpers;
use Carbon\Carbon;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class TokenGeneratorService
{
    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer
    ): Token {
        try {
            // Execute the database transaction
            return DB::transaction(function () use (
                $customer,
            ) {
                // Generate and store the token
                return Token::updateOrCreate([
                    'customer_id' => data_get(target: $customer, key: 'id'),
                ], [
                    'token' => Helpers::generateToken(table: 'tokens', length: 6),
                    'token_expiration_date' => Carbon::now()->addMinutes(5),
                    'is_verified' => false,
                ])->refresh();
            });
        } catch (
            Throwable $throwable
        ) {
            // Log the full exception with context
            Log::error('Exception in TokenGeneratorService', [
                'customer' => $customer,
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
