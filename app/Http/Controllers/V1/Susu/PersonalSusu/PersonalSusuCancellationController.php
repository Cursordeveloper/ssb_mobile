<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\PersonalSusuCancellationAction;
use Illuminate\Http\Request;

final class PersonalSusuCancellationController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuCancellationAction
        return PersonalSusuCancellationAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
