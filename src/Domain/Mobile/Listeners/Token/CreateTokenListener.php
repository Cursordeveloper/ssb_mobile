<?php

namespace Domain\Mobile\Listeners\Token;

use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
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
