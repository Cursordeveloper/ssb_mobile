<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use Illuminate\Support\Facades\Http;

final class PersonalSusuShowAction
{
    public static function execute(
        string $personal_susu,
        array $request,
    ): array {
        // Send the request and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->get(
            url: env(key: 'SSB_SUSU').'customers/'.auth()->user()['resource_id'].'/personal/'.$personal_susu,
        )->json();
    }
}
