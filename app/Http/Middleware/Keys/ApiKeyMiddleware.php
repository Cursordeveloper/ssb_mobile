<?php

declare(strict_types=1);

namespace App\Http\Middleware\Keys;

use App\Common\ResponseBuilder;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('API-KEY');

        if ($apiKey !== config('services.keys.api_key')) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNAUTHORIZED,
                message: 'Unauthorised action.',
                description: 'Invalid API key.',
            );
        }

        return $next($request);
    }
}
