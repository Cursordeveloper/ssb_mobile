<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\DebitRollover;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\DebitRollover\BizSusuDebitRolloverAction;
use Illuminate\Http\Request;

final class BizSusuDebitRolloverController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        BizSusuDebitRolloverAction $BizSusuDebitRolloverAction
    ): array {
        // Execute the BizSusuDebitRolloverAction and return the response
        return $BizSusuDebitRolloverAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
