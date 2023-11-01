<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use Domain\Susu\Personal\Actions\PersonalSusuAction;
use Illuminate\Http\Request;

final class PersonalSusuController extends Controller
{
    public function __invoke(
        $susu,
        Request $request,
    ): array {
        // Get the personal susu
        return PersonalSusuAction::execute(
            $susu,
            $request->toArray()
        );
    }
}
