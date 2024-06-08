<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\GoalGetterSusuAction;
use Illuminate\Http\Request;

final class GoalGetterSusuController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the GoalGetterSusuAction
        return GoalGetterSusuAction::execute(customer: auth()->user(), susu: $susu, request: $request->toArray());
    }
}
