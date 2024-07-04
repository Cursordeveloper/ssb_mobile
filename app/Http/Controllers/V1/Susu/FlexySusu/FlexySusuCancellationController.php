<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\FlexySusuCancellationAction;
use Illuminate\Http\Request;

final class FlexySusuCancellationController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuCancellationAction
        return FlexySusuCancellationAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
