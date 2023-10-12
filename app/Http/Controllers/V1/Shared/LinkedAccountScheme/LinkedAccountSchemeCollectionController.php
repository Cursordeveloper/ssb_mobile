<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Shared\LinkedAccountScheme;

use App\Http\Controllers\Controller;
use Domain\Shared\Action\LinkedAccountSchemes\LinkAccountSchemesCollectionAction;
use Illuminate\Http\Request;

final class LinkedAccountSchemeCollectionController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Get all active schemes
        return LinkAccountSchemesCollectionAction::execute();
    }
}
