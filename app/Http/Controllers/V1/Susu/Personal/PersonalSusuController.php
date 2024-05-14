<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use Domain\Susu\Personal\Actions\PersonalSusuAction;
use Illuminate\Http\Request;

final class PersonalSusuController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuAction
        return PersonalSusuAction::execute(customer: auth()->user(), susu: $susu, request: $request->toArray());
    }
}
