<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use Illuminate\Support\Facades\Http;

final class PersonalSusuApprovalAction
{
    public static function execute(
        array $request,
        string $susu_resource
    ): array {
        // Send the request and return the response
        return Http::withHeaders([
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ])->post(
            url: env(key: 'SSB_SUSU').'customers/'.auth()->user()['resource_id'].'/personal/'.$susu_resource.'/approval',
            data: $request,
        )->json();
    }
}
