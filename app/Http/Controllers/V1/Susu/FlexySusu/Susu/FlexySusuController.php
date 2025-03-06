<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\FlexySusuAction;
use Illuminate\Http\Request;

final class FlexySusuController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuAction
        return FlexySusuAction::execute(customer: auth()->user(), susu: $susu, request: $request->toArray());
    }
}
