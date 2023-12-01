<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use Domain\Susu\Personal\Actions\PersonalSusuCollectionAction;

final class PersonalSusuCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Execute the PersonalSusuCollectionAction
        return PersonalSusuCollectionAction::execute(auth_user: auth()->user());
    }
}
