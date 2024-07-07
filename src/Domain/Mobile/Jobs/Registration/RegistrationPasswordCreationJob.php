<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Registration;

use App\Services\Customer\Requests\Registration\CustomerServiceRegistrationPasswordCreationRequest;
use Domain\Mobile\Data\Registration\CustomerData;
use Domain\Mobile\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationPasswordCreationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public readonly Customer $customer)
    {
    }

    public function handle(): void
    {
        // Define the message data
        $data = CustomerData::toArray(customer: $this->customer);

        // Publish message through http
        (new CustomerServiceRegistrationPasswordCreationRequest)->execute(customer: $this->customer, data: $data);
    }
}
