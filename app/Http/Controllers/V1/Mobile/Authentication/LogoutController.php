<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Authentication;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use Domain\Mobile\Actions\Authentication\LogoutAction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LogoutController extends Controller
{
    public function __invoke(
        Request $request,
    ): JsonResponse {
        // Execute the logout action
        LogoutAction::execute();

        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'You have successfully been logged out.',
        );
    }
}
