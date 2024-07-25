<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\AccountPause\PersonalSusuAccountPauseAction;
use Illuminate\Http\Request;

final class PersonalSusuAccountPauseController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuAccountPauseAction
        return PersonalSusuAccountPauseAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
