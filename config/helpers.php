<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

function generateToken(
    string $table,
    int $length
): string {
    $number = '';
    do {
        for ($i = $length; $i--; $i > 0) {
            $number .= mt_rand(1, 9);
        }
    } while (! empty(DB::table($table)->where(column: 'token', operator: $number)->first(['token'])));

    return $number;
}

// Generate bearer token
function respondWithToken(
    $token
): JsonResponse {
    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth(
                guard: 'customer',
            )->factory(null)->getTTL(null) * 120,
    ]);
}
