<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Pin;

use Domain\Customer\Actions\Common\FetchCustomerAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ChangePinJob implements ShouldQueue
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
        $customer = FetchCustomerAction::execute();
        logger(data_get(target: $customer, key: 'id'));
    }
}
