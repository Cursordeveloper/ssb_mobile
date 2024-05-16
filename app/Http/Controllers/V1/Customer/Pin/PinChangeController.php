<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Pin;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinChangeRequest;
use Domain\Customer\Actions\Pin\PinChangeAction;

final class PinChangeController extends Controller
{
    public function __invoke(PinChangeRequest $request): array
    {
        // Execute the PinChangeAction
        return PinChangeAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
