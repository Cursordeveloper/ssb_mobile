<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Susu\Biz\BizSusuCreateRequest;
use Domain\Susu\BizSusu\Actions\Account\BizSusuCreateAction;

final class BizSusuCreateController extends Controller
{
    public function __invoke(BizSusuCreateRequest $request): array
    {
        // Execute and return the BizSusuCreateAction
        return BizSusuCreateAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
