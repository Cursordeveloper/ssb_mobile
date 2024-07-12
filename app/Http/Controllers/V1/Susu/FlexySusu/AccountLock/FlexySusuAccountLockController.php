<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\AccountLock\FlexySusuAccountLockAction;
use Illuminate\Http\Request;

final class FlexySusuAccountLockController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuAccountLockAction
        return FlexySusuAccountLockAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
