<?php

declare(strict_types=1);

namespace App\Services\Susu\Requests\FlexySusu\Withdrawal;

use App\Services\Susu\SusuService;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Http;

final class SusuServiceFlexySusuWithdrawalCancellationRequest
{
    public SusuService $service;

    public function __construct()
    {
        $this->service = new SusuService;
    }

    public function execute(Customer $customer, string $susu, string $withdrawal, array $request): array
    {
        return Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])
            ->post(url: $this->service->base_url.'customers/'.$customer->resource_id.'/flexy-susus/'.$susu.'/withdrawals/'.$withdrawal.'/cancellations', data: $request)
            ->json();
    }
}
