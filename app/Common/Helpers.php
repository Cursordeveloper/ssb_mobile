<?php

declare(strict_types=1);

namespace App\Common;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

final class Helpers
{
    public static function generateToken(string $table, int $length): string
    {
        $number = '';
        do {
            for ($i = $length; $i--; $i > 0) {
                $number .= mt_rand(1, 9);
            }
        } while (! empty(DB::table($table)->where(column: 'token', operator: $number)->first(['token'])));

        return $number;
    }

    public static function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth(guard: 'customer')->factory(null)->getTTL(null) * 120,
        ]);
    }
}
