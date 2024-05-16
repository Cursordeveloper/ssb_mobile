<?php

declare(strict_types=1);

namespace App\Services\Notification\Data\Password;

use Carbon\Carbon;
use Domain\Mobile\Models\Token;

final class PasswordResetRequestTokenData
{
    public static function toArray(Token $token): array
    {
        return [
            'data' => [
                // Resource type and id
                'type' => 'Token',

                // Resource exposed attributes
                'attributes' => [
                    'token' => $token->token,
                    'token_expiration_date' => Carbon::parse($token->token_expiration_date)->toDayDateTimeString(),
                ],
            ],
        ];
    }
}
