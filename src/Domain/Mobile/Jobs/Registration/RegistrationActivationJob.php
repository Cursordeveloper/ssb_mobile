<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Registration;

use App\Services\Customer\Requests\Registration\CustomerServiceCustomerCreateRequest;
use App\Services\Ussd\Requests\UssdServiceCustomerCreateRequest;
use Domain\Mobile\Data\Registration\CustomerData;
use Domain\Mobile\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationActivationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Customer $customer,
        public readonly array $request
    ) {
        // ...
    }

    public function handle(): void
    {
        // Define the message data
        $data = CustomerData::toArray(customer: $this->customer);

        // Publish message through http
        (new CustomerServiceCustomerCreateRequest)->execute(data: $data);
        (new UssdServiceCustomerCreateRequest)->execute(data: $data);
    }
}
