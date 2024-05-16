<?php

declare(strict_types=1);

namespace App\Services\Customer\Requests\Scheme;

use App\Services\Customer\CustomerService;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Http;

final class CustomerServiceLinkedSchemesRequest
{
    public CustomerService $service;

    public function __construct()
    {
        $this->service = new CustomerService;
    }

    public function execute(): array
    {
        return Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])->get(
            url: $this->service->base_url.'schemes',
        )->json();
    }
}
