<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SusuBalanceAction;
use Illuminate\Http\Request;

final class SusuBalanceController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        SusuBalanceAction $susuBalanceAction
    ): array {
        // Execute the SusuBalanceAction
        return $susuBalanceAction->execute(
            susu: $susu,
            request: $request->all()
        );
    }
}
