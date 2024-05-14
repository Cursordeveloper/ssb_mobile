<?php

declare(strict_types=1);

namespace Domain\Mobile\Events\Token;

use Domain\Mobile\Models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class DeleteTokenEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(public Customer $customer)
    {
    }
}
