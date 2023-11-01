<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use Domain\Susu\Personal\Actions\PersonalSusuBalanceAction;
use Illuminate\Http\Request;

final class PersonalSusuBalanceController extends Controller
{
    public function __invoke(
        $susu,
        Request $request,
    ): array {
        // Get the personal susu
        return PersonalSusuBalanceAction::execute(
            $susu,
            $request->toArray()
        );
    }
}
