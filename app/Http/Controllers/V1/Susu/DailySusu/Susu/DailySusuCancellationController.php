<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Account;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Susu\DailySusuCancellationAction;
use Illuminate\Http\Request;

final class DailySusuCancellationController extends Controller
{
    private DailySusuCancellationAction $dailySusuCancellationAction;

    public function __construct(
        DailySusuCancellationAction $dailySusuCancellationAction
    ) {
        $this->dailySusuCancellationAction = $dailySusuCancellationAction;
    }

    public function __invoke(
        string $susu,
        Request $request
    ): array {
        // Execute and return the DailySusuCancellationAction
        return $this->dailySusuCancellationAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
