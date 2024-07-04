<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\BizSusuCancellationAction;
use Illuminate\Http\Request;

final class BizSusuCancellationController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuCancellationAction
        return BizSusuCancellationAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
