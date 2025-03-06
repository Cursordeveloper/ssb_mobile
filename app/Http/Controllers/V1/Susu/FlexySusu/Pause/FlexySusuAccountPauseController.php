<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\AccountPause\FlexySusuAccountPauseAction;
use Illuminate\Http\Request;

final class FlexySusuAccountPauseController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuAccountPauseAction
        return FlexySusuAccountPauseAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
