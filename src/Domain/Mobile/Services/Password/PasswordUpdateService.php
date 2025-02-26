<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Password;

use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

final class PasswordUpdateService
{
    /**
     * @throws SystemFailureExec
     */
    public function execute(
        Customer $customer,
        array $request,
    ): bool {
        try {
            // Get the attributes
            $attributes = data_get($request, 'data.attributes');

            // Execute the database transaction
            return DB::transaction(function () use (
                $customer,
                $attributes
            ) {
                return $customer->update([
                    'password' => Hash::make($attributes['password']),
                ]);
            });
        } catch (
            Throwable $throwable
        ) {
            // Log the full exception with context
            Log::error('Exception in PasswordUpdateService', [
                'customer' => $customer,
                'request' => $request,
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
