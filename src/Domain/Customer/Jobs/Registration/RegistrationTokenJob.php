<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Registration;

use App\Jobs\Customer\Registration\RegistrationTokenMessage;
use Domain\Customer\Actions\Common\FetchCustomerAction;
use Domain\Customer\Actions\Token\GenerateTokenAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationTokenJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        // Get the customer
        $customer = FetchCustomerAction::execute(
            request: $this->request
        );

        // Generate the token
        $token = GenerateTokenAction::execute(
            customer: $customer
        );

        // Publish the RegistrationTokenMessage to the notification service
        RegistrationTokenMessage::dispatch(
            token_data: $token->toData()
        );
    }
}
