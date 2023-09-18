<?php

declare(strict_types=1);

//use Domain\Shared\Model\Scheme;
use Illuminate\Support\Facades\DB;

function generateToken(string $table, int $length): string
{
    $number = '';
    do {
        for ($i = $length; $i--; $i > 0) {
            $number .= mt_rand(1, 9);
        }
    } while (! empty(DB::table($table)->where(column: 'token', operator: $number)->first(['token'])));

    return $number;
}

//function getSchemeId(string $resource_id): int
//{
//    $scheme = Scheme::where('resource_id', '=', $resource_id)->first();
//
//    return data_get(target: $scheme, key: 'id');
//}
