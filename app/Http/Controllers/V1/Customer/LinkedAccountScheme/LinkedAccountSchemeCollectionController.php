<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccountScheme;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccountSchemes\LinkAccountSchemesCollectionAction;

final class LinkedAccountSchemeCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Send the request and return the response
        return LinkAccountSchemesCollectionAction::execute(auth_user: auth()->user());
    }
}
