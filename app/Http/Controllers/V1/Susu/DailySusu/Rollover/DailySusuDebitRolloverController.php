<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Rollover;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\DebitRollover\DailySusuDebitRolloverAction;
use Illuminate\Http\Request;

final class DailySusuDebitRolloverController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        DailySusuDebitRolloverAction $DailySusuDebitRolloverAction
    ): array {
        // Execute the DailySusuDebitRolloverAction and return the response
        return $DailySusuDebitRolloverAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
