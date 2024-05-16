<?php

declare(strict_types=1);

namespace App\Services\Susu\Requests\Shared;

use App\Services\Susu\SusuService;
use Illuminate\Support\Facades\Http;

final class SchemesRequest
{
    public SusuService $service;

    public function __construct()
    {
        $this->service = new SusuService;
    }

    public function execute(): array
    {
        return Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])->get(
            url: $this->service->base_url.'schemes',
        )->json();
    }
}
