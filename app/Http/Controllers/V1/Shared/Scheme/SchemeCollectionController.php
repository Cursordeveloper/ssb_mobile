<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Shared\Scheme;

use App\Http\Controllers\Controller;
use Domain\Shared\Action\Schemes\GetSchemesActions;
use Illuminate\Http\Request;

final class SchemeCollectionController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Get all active schemes
        return GetSchemesActions::execute();
    }
}
