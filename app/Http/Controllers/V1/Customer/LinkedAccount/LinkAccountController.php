<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\LinkedAccount\LinkAccountRequest;
use Domain\Customer\Actions\LinkedAccounts\LinkAccountAction;

final class LinkAccountController extends Controller
{
    public function __invoke(LinkAccountRequest $request): array
    {
        // Execute and return the LinkAccountAction
        return LinkAccountAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
