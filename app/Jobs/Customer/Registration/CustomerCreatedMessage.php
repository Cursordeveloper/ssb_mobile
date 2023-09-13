<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CustomerCreatedMessage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array $customer_data,
        private readonly array $request
    ) {}

    public function handle(): void
    {
        logger($this->customer_data);
        logger($this->request);
    }
}
