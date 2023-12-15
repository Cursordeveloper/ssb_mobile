<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use Illuminate\Support\Facades\Http;

final class LinkedAccountAction
{
    public static function execute(
        string $linked_account,
    ): array {
        // Send (request) and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: config(key: 'services.susubox.ssb_customer.base_url').auth()->user()['resource_id'].'/linked-accounts/'.$linked_account,
        )->json();
    }
}
