<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Registration;

use App\Services\Notification\Requests\Registration\NotificationServiceRegistrationVerificationRequest;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\Data\Registration\RegistrationVerificationData;
use Domain\Mobile\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationVerificationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public readonly Customer $customer)
    {
    }

    public function handle(): void
    {
        // Generate Token
        $token = GenerateTokenAction::execute(customer: $this->customer);

        // Publish message through http
        (new NotificationServiceRegistrationVerificationRequest)->execute(data: RegistrationVerificationData::toArray(customer: $this->customer, token: $token));
    }
}
