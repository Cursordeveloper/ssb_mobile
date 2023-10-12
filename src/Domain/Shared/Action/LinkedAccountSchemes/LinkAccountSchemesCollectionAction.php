<?php

declare(strict_types=1);

namespace Domain\Shared\Action\LinkedAccountSchemes;

use Illuminate\Support\Facades\Http;

final class LinkAccountSchemesCollectionAction
{
    public static function execute(): array
    {
        // Get Schemes from Cache or

        // Get Schemes from ssb_customer_service
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: env(key: 'SSB_CUSTOMER').'schemes',
        )->json();
    }
}
