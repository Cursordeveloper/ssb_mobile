<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Registration;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\DB;

final class RegistrationVerificationService
{
    public static function execute(string $phone_number): ?Customer
    {
        // Update the customer email
        return DB::transaction(function () use ($phone_number) {
            return Customer::where(column: 'phone_number', operator: '=', value: $phone_number)->first();
        });
    }
}
