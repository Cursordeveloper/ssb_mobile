<?php

declare(strict_types=1);

namespace App\Services\Susu\Requests\Susu;

use App\Services\Susu\SusuService;
use Domain\Mobile\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

final class SusuTransactionsRequest
{
    public SusuService $service;

    public function __construct()
    {
        $this->service = new SusuService;
    }

    public function execute(Customer $customer, string $susu, Request $request): array
    {
        $size = $request->size ?? 20;

        return Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])->get(
            url: $this->service->base_url.'customers/'.$customer->resource_id.'/susus/'.$susu.'/transactions?size='.$size,
        )->json();
    }
}
