<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Tokens;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Common\DeleteTokenService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class DeleteTokenJob implements ShouldQueue
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
        DeleteTokenService $deleteTokenService
    ): void {
        // Execute the DeleteTokenService
        $deleteTokenService->execute(
            customer: $this->customer
        );
    }
}
