<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SusuTransactionsAction;
use Illuminate\Http\Request;

final class SusuTransactionsController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute the SusuTransactionsAction
        return SusuTransactionsAction::execute(customer: auth()->user(), susu: $susu);
    }
}
