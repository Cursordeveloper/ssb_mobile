<?php

declare(strict_types=1);

namespace App\Services\Ussd\Requests;

use App\Services\Ussd\UssdService;
use Illuminate\Support\Facades\Http;

final class UssdServiceCustomerCreateRequest
{
    public UssdService $service;

    public function __construct()
    {
        $this->service = new UssdService;
    }

    public function execute(array $data): void
    {
        Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])->post(
            url: $this->service->base_url.'customers',
            data: $data
        )->json();
    }
}
