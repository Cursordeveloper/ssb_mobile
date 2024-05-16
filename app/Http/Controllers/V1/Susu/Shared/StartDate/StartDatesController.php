<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Shared\StartDate;

use App\Http\Controllers\Controller;
use Domain\Susu\Shared\Actions\StartDate\StartDatesAction;
use Illuminate\Http\Request;

final class StartDatesController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute the StartDatesAction
        return StartDatesAction::execute();
    }
}
