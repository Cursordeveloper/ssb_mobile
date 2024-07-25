<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\AccountPause\BizSusuAccountPauseAction;
use Illuminate\Http\Request;

final class BizSusuAccountPauseController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuAccountPauseAction
        return BizSusuAccountPauseAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
