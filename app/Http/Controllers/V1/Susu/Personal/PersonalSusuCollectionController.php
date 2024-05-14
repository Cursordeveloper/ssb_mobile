<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use Domain\Susu\Personal\Actions\PersonalSusuCollectionAction;

final class PersonalSusuCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Execute and return the PersonalSusuCollectionAction
        return PersonalSusuCollectionAction::execute(customer: auth()->user());
    }
}
