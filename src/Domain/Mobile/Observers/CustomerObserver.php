<?php

declare(strict_types=1);

namespace Domain\Mobile\Observers;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class CustomerObserver
{
    public function creating(
        Customer $customer,
    ): void {
        $customer -> password = Hash::make(
            $customer -> password,
        );
        $customer -> resource_id = Str::uuid();
    }
}
