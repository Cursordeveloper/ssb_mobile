<?php

namespace Domain\Mobile\Listeners\Token;

use Domain\Mobile\Actions\Common\Token\DeleteTokenAction;
use Illuminate\Contracts\Queue\ShouldQueue;

final class DeleteTokenListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Delete the customer token
        DeleteTokenAction::execute(customer: $event->customer);
    }
}
