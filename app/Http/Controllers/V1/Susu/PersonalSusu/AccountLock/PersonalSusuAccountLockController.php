<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\AccountLock\PersonalSusuAccountLockAction;
use Illuminate\Http\Request;

final class PersonalSusuAccountLockController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuAccountLockAction
        return PersonalSusuAccountLockAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
