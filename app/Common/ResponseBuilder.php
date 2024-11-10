<?php

declare(strict_types=1);

namespace App\Common;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseBuilder
{
    public static function collectionResponseBuilder(bool $status, int $code, string $message, ?string $description = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'data' => $data->data,
            'data_meta' => $data->meta,
        ]);
    }

    public static function resourcesResponseBuilder(bool $status, int $code, string $message, ?string $description = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'data' => $data,
        ]);
    }

    public static function paginateResourcesResponseBuilder(bool $status, int $code, string $message, ?string $description = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'data' => data_get(target: $data, key: 'data'),
            'data_meta' => data_get(target: $data, key: 'meta'),
        ]);
    }

    public static function unprocessableEntityResponseBuilder(bool $status, int $code, string $message, ?string $description = null, mixed $error = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'errors' => $error,
        ]);
    }

    public static function errorResponseBuilder(bool $status, int $code, string $message, ?string $description = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
        ]);
    }

    public static function tokenResponseBuilder(bool $status, int $code, string $message, mixed $token = null, mixed $user = null): JsonResponse
    {
        return response()->json([
            'version' => '1.0',
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $user,
            'token' => $token,
        ]);
    }
}
