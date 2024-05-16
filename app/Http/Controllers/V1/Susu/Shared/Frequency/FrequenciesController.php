<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Shared\Frequency;

use App\Http\Controllers\Controller;
use Domain\Susu\Shared\Actions\Frequency\FrequenciesAction;
use Illuminate\Http\Request;

final class FrequenciesController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute the FrequenciesAction
        return FrequenciesAction::execute();
    }
}
