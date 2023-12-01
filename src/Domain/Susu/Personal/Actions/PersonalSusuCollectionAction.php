<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use Illuminate\Support\Facades\Http;

final class PersonalSusuCollectionAction
{
    public static function execute($auth_user): array
    {
        // Send the request and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(url: config(key: 'services.ssb_susu.base_url').'customers/'.$auth_user->resource_id.'/personal')->json();
    }
}
