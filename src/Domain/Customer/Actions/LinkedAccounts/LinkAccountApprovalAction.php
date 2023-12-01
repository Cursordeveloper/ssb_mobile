<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use Illuminate\Support\Facades\Http;

final class LinkAccountApprovalAction
{
    public static function execute(
        array $request,
    ): array {
        // Send (request) and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: config(key: 'services.ssb_customer.base_url').auth()->user()['resource_id'].'/linked-accounts/approval',
            data: $request,
        )->json();
    }
}
