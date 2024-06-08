<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\GoalGetterSusuCollectionAction;

final class GoalGetterSusuCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Execute and return the GoalGetterSusuCollectionAction
        return GoalGetterSusuCollectionAction::execute(customer: auth()->user());
    }
}
