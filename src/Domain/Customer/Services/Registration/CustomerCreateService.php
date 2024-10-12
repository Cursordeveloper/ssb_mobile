<?php

declare(strict_types=1);

namespace Domain\Customer\Services\Registration;

use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Illuminate\Support\Str;
use Throwable;

final class CustomerCreateService
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(array $request): Customer
    {
        try {
            return Customer::create([
                'resource_id' => Str::uuid()->toString(),
                'phone_number' => data_get(target: $request, key: 'data.attributes.phone_number'),
            ]);
        } catch (Throwable $exception) {
            throw new SystemFailureExec;
        }
    }
}
