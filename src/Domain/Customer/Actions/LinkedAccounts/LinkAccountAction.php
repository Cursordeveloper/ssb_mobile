<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use Domain\Customer\DTO\LinkedAccount\LinkedAccountDTO;
use Illuminate\Support\Facades\Http;

final class LinkAccountAction
{
    public static function execute(array $request): array
    {
        // Post and return the http request
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: config(key: 'services.ssb_customer.base_url').auth()->user()['resource_id'].'/linked-accounts',
            data: [
                'data' => LinkedAccountDTO::toArray(request: $request)
            ],
        )->json();
    }
}
