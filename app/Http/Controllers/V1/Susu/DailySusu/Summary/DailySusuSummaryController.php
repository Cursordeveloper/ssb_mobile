<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Collection;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Summary\DailySusuSummaryAction;
use Illuminate\Http\Request;

final class DailySusuSummaryController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        DailySusuSummaryAction $dailySusuSummaryAction
    ): array {
        // Execute and return the DailySusuSummaryAction
        return $dailySusuSummaryAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
