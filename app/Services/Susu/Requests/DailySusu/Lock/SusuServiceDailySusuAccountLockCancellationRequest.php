<?php

declare(strict_types=1);

namespace App\Services\Susu\Requests\DailySusu\Lock;

use App\Services\Susu\SusuService;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Http;

final class SusuServiceDailySusuAccountLockCancellationRequest
{
    public SusuService $service;

    public function __construct()
    {
        $this->service = new SusuService;
    }

    public function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        return Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])
            ->post(url: $this->service->base_url.'customers/'.$customer->resource_id.'/daily-susus/'.$susu.'/account-locks/'.$account_lock.'/cancellations', data: $request)
            ->json();
    }
}
