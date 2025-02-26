<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\DebitRollover;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\DebitRollover\PersonalSusuDebitRolloverAction;
use Illuminate\Http\Request;

final class PersonalSusuDebitRolloverController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        PersonalSusuDebitRolloverAction $personalSusuDebitRolloverAction
    ): array {
        // Execute the PersonalSusuDebitRolloverAction and return the response
        return $personalSusuDebitRolloverAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
