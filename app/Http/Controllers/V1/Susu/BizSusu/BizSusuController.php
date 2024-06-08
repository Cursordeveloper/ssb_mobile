<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\BizSusuAction;
use Illuminate\Http\Request;

final class BizSusuController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuAction
        return BizSusuAction::execute(customer: auth()->user(), susu: $susu, request: $request->toArray());
    }
}
