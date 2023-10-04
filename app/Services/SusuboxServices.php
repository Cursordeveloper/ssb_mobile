<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class SusuboxServices
{
    public function getSchemes(): array
    {
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: env(key: 'SSB_CUSTOMER').'schemes',
        )->json();
    }

    public function linkAccount(array $request): array
    {
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: env(key: 'SSB_CUSTOMER').'customers/linked-accounts',
            data: ['data' => $request],
        )->json();
    }
}
