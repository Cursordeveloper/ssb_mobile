<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SusuBalanceAction;
use Illuminate\Http\Request;

final class SusuBalanceController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute the SusuBalanceAction
        return SusuBalanceAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
