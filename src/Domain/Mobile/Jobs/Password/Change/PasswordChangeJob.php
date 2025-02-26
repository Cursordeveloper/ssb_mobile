<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Password\Change;

use App\Services\Notification\Requests\Password\NotificationServicePasswordChangeConfirmationRequest;
use Domain\Mobile\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class PasswordChangeJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Customer $customer
    ) {
        // ...
    }

    public function handle(
        NotificationServicePasswordChangeConfirmationRequest $notificationServicePasswordChangeConfirmationRequest
    ): void {
        // Publish message through http
        $notificationServicePasswordChangeConfirmationRequest->execute(
            customer: $this->customer
        );
    }
}
