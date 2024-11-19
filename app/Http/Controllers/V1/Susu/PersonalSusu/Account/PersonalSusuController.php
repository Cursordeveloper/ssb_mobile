<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Account;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Account\PersonalSusuAction;
use Illuminate\Http\Request;

final class PersonalSusuController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuAction
        return PersonalSusuAction::execute(customer: auth()->user(), susu: $susu, request: $request->toArray());
    }
}
