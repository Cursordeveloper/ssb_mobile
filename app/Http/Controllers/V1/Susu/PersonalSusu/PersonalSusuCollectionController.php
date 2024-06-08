<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\PersonalSusuCollectionAction;

final class PersonalSusuCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Execute and return the PersonalSusuCollectionAction
        return PersonalSusuCollectionAction::execute(customer: auth()->user());
    }
}
