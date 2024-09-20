<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Kyc;

use Domain\Mobile\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class KycVerificationConfirmationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public readonly Customer $customer, public readonly array $request)
    {
    }

    public function handle(): void
    {
        // Update the customer [has_kyc] to true
        $this->customer->update(attributes: ['has_kyc' => true]);
    }
}
