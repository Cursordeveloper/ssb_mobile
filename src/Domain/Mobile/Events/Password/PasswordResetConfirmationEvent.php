<?php

declare(strict_types=1);

namespace Domain\Mobile\Events\Password;

use Domain\Mobile\Models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class PasswordResetConfirmationEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public Customer $customer
    ) {
    }
}
