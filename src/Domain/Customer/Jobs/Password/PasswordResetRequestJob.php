<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Password;

use App\Jobs\Customer\Password\PasswordResetRequestEvent;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Common\Token\GenerateTokenAction;
use Domain\Customer\DTO\Token\TokenDTO;
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
