<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccounts\LinkAccountCancellationAction;
use Illuminate\Http\Request;

final class LinkAccountCancellationController extends Controller
{
    public function __invoke(string $linked_account, Request $request): array
    {
        // Execute and return the LinkAccountCancellationAction
        return LinkAccountCancellationAction::execute(customer: auth()->user(), linked_account: $linked_account, request: $request->all());
    }
}
