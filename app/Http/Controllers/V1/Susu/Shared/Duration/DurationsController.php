<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Shared\Duration;

use App\Http\Controllers\Controller;
use Domain\Susu\Shared\Actions\Duration\DurationsAction;
use Illuminate\Http\Request;

final class DurationsController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute the DurationsAction
        return DurationsAction::execute();
    }
}
