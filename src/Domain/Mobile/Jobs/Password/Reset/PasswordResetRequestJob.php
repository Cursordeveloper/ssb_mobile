<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Password\Reset;

use App\Services\Notification\Data\Password\NotificationServicePasswordResetRequestTokenData;
use App\Services\Notification\Requests\Password\NotificationServicePasswordResetRequest;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;
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
        public Customer $customer,
        public Token $token
    ) {
        // ...
    }

    public function handle(
        NotificationServicePasswordResetRequest $notificationServicePasswordResetRequest
    ): void {
        $notificationServicePasswordResetRequest->execute(
            customer: $this->customer,
            data: NotificationServicePasswordResetRequestTokenData::toArray(
                $this->token
            )
        );
    }
}
