<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\DebitRollover;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\DebitRollover\GoalGetterSusuDebitRolloverAction;
use Illuminate\Http\Request;

final class GoalGetterSusuDebitRolloverController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        GoalGetterSusuDebitRolloverAction $GoalGetterSusuDebitRolloverAction
    ): array {
        // Execute the GoalGetterSusuDebitRolloverAction and return the response
        return $GoalGetterSusuDebitRolloverAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
