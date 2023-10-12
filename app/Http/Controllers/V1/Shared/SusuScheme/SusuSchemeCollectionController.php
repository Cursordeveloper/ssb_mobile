<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Shared\SusuScheme;

use App\Http\Controllers\Controller;
use Domain\Shared\Action\SusuSchemes\SusuSchemesCollectionAction;
use Illuminate\Http\Request;

final class SusuSchemeCollectionController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Get all active schemes
        return SusuSchemesCollectionAction::execute();
    }
}
