<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SusuPauseAction;
use Illuminate\Http\Request;

final class SusuPauseController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute the SusuPauseAction
        return SusuPauseAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
