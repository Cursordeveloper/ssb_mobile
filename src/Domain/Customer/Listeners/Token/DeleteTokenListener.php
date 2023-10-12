<?php

namespace Domain\Customer\Listeners\Token;

use Domain\Customer\Actions\Common\Token\DeleteTokenAction;
use Illuminate\Contracts\Queue\ShouldQueue;

final class DeleteTokenListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Delete the token after activation
        DeleteTokenAction::execute(
            customer: $event->customer
        );
    }
}
