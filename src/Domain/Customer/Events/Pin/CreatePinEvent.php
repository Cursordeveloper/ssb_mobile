<?php

declare(strict_types=1);

namespace Domain\Customer\Events\Pin;

use Domain\Customer\DTO\Pin\PinDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class CreatePinEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public PinDTO $pin_dto
    ) {
    }
}
