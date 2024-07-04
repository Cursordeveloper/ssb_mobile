<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\GoalGetterSusuCancellationAction;
use Illuminate\Http\Request;

final class GoalGetterSusuCancellationController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the GoalGetterSusuCancellationAction
        return GoalGetterSusuCancellationAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
