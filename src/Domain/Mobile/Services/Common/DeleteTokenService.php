<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Common;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final class DeleteTokenService
{
    public function execute(
        Customer $customer
    ): void {
        try {
            // Execute the database transaction
            DB::transaction(function () use (
                $customer,
            ) {
                Token::query()->where(
                    column: 'customer_id',
                    operator: '=',
                    value: $customer->id
                )->delete();
            });
        } catch (
            Throwable $throwable
        ) {
            // Log the full exception with context
            Log::error('Exception in DeleteTokenService', [
                'customer' => $customer,
                'exception' => [
                    'message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                ],
            ]);
        }
    }
}
