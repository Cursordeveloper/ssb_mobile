<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Password;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class PasswordResetRequestJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array $request
    ) {
    }

    public function handle(): void
    {
        // Get the customer
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $this->request,
                key: 'data.attributes.email',
            )
        );

        // Generate password reset token
        GenerateTokenAction::execute(
            customer: $customer,
        );
    }
}
