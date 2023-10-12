<?php

namespace Domain\Customer\Listeners\Token;

use Domain\Customer\Actions\Common\Token\GenerateTokenAction;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CreateTokenListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Create the token
        GenerateTokenAction::execute(
            customer: $event->customer,
        );
    }
}
