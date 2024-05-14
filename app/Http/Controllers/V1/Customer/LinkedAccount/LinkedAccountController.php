<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccounts\LinkedAccountAction;

final class LinkedAccountController extends Controller
{
    public function __invoke(string $linked_account): array
    {
        // Execute and return the LinkedAccountAction
        return LinkedAccountAction::execute(customer: auth()->user(), linked_account: $linked_account);
    }
}
