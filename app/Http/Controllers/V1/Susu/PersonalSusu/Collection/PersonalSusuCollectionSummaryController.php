<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Collection;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Collection\PersonalSusuCollectionSummaryAction;
use Illuminate\Http\Request;

final class PersonalSusuCollectionSummaryController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuCollectionSummaryAction
        return PersonalSusuCollectionSummaryAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
