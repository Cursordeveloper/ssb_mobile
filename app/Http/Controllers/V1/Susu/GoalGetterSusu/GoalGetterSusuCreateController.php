<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Susu\GoalGetter\GoalGetterSusuCreateRequest;
use Domain\Susu\GoalGetterSusu\Actions\GoalGetterSusuCreateAction;

final class GoalGetterSusuCreateController extends Controller
{
    public function __invoke(GoalGetterSusuCreateRequest $request): array
    {
        // Execute and return the GoalGetterSusuAction
        return GoalGetterSusuCreateAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
