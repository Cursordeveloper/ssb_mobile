<?php

declare(strict_types=1);

namespace Domain\Customer\Events\Token;

use Domain\Customer\Models\Token;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class TokenCreatedEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public Token $token
    ) {
    }
}
