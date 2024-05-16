<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccountScheme;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccountSchemes\LinkAccountSchemesAction;

final class LinkedAccountSchemesController extends Controller
{
    public function __invoke(): array
    {
        // Execute the LinkAccountSchemesAction
        return LinkAccountSchemesAction::execute();
    }
}
