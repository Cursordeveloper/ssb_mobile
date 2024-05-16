<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Customer\Actions\LinkedAccounts\LinkAccountApprovalAction;

final class LinkAccountApprovalController extends Controller
{
    public function __invoke(string $linked_account, PinApprovalRequest $request): array
    {
        // Execute and return the LinkAccountApprovalAction
        return LinkAccountApprovalAction::execute(customer: auth()->user(), linked_account: $linked_account, request: $request->validated());
    }
}
