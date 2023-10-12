<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use Illuminate\Support\Facades\Http;

final class LinkAccountApprovalAction
{
    public static function execute(
        string $linked_account,
        array $request,
    ): array {
        // Send (request) and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: env(key: 'SSB_CUSTOMER').auth()->user()['resource_id'].'/linked-accounts/'.$linked_account.'/approval',
            data: $request,
        )->json();
    }
}
