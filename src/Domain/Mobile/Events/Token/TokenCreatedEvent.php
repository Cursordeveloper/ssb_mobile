<?php

declare(strict_types=1);

namespace Domain\Mobile\Events\Token;

use Domain\Mobile\Models\Token;
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
