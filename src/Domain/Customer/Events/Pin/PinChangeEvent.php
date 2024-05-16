<?php

declare(strict_types=1);

namespace Domain\Customer\Events\Pin;

use Domain\Mobile\Models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class PinChangeEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(public Customer $customer, public array $request)
    {
    }
}
