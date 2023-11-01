<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use Illuminate\Support\Facades\Http;

final class PersonalSusuCreateAction
{
    public static function execute(
        array $request,
    ): array {
        // Get susu schemes from Cache or

        // Get Schemes from ssb_susu_service
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: env(key: 'SSB_SUSU').'customers/'.auth()->user()['resource_id'].'/personal',
            data: $request
        )->json();
    }
}
