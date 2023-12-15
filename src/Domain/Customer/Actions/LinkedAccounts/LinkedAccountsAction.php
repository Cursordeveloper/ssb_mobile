<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use Illuminate\Support\Facades\Http;

final class LinkedAccountsAction
{
    public static function execute(): array
    {
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: config(key: 'services.susubox.ssb_customer.base_url').auth()->user()['resource_id'].'/linked-accounts',
        )->json();
    }
}
