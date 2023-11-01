<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Susu\Personal\CreatePersonalSusuRequest;
use Domain\Susu\Personal\Actions\PersonalSusuCreateAction;

final class PersonalSusuCreateController extends Controller
{
    public function __invoke(
        CreatePersonalSusuRequest $request,
    ): array {
        return PersonalSusuCreateAction::execute(
            $request->validated(),
        );
    }
}
