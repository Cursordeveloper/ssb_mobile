<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Hash;

final class UpdatePasswordAction
{
    public static function execute(
        Customer $customer,
        array $request,
    ): bool {
        $customer = Customer::query()->where(
            column: 'id',
            operator: '=',
            value: data_get(
                target: $customer,
                key: 'id'
            )
        )->first();
        $customer->password = Hash::make(
            value: data_get(
                target: $request,
                key: 'data.attributes.password'
            )
        );
        return $customer->save();
    }
}
