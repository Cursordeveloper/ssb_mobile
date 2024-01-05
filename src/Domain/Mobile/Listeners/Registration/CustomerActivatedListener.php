<?php

namespace Domain\Mobile\Listeners\Registration;

use App\Services\Customer\CustomerService;
use App\Services\Ussd\UssdService;
use Domain\Mobile\DTO\Registration\CustomerDTO;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CustomerActivatedListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        // Define the message data
        $data = ['data' => CustomerDTO::toArray(customer: $event->data)];

        // Publish message through http
        (new CustomerService)->storeCustomer($data);
        (new UssdService)->storeCustomer($data);

        // Define the message headers
        //        $headers = ['origin' => 'mobile', 'action' => 'CreateCustomerAction'];

        // Initialize the RabbitMQService and publish messages
        //        $rabbitMQService = new RabbitMQService;
        //        $rabbitMQService->publish(exchange: 'ssb_direct', routingKey: 'ssb_uss', data: $data, headers: $headers);
        //        $rabbitMQService->publish(exchange: 'ssb_direct', routingKey: 'ssb_cus', data: $data, headers: $headers);
    }
}
