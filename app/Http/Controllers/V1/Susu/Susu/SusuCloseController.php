<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SusuCloseAction;
use Illuminate\Http\Request;

final class SusuCloseController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute the SusuCloseAction
        return SusuCloseAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
