<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Susu\Flexy\FlexySusuCreateRequest;
use Domain\Susu\FlexySusu\Actions\FlexySusuCreateAction;

final class FlexySusuCreateController extends Controller
{
    public function __invoke(FlexySusuCreateRequest $request): array
    {
        // Execute and return the FlexySusuAction
        return FlexySusuCreateAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
