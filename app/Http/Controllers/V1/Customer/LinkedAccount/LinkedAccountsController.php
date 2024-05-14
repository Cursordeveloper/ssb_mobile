<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccounts\LinkedAccountsAction;
use Illuminate\Http\Request;

final class LinkedAccountsController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute and return the LinkedAccountsAction
        return LinkedAccountsAction::execute(customer: auth(guard: 'customer')->user());
    }
}
