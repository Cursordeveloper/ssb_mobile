<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Schemes;

use App\Http\Controllers\Controller;
use Domain\Susu\Actions\Schemes\SchemesCollectionAction;
use Illuminate\Http\Request;

final class SchemeCollectionController extends Controller
{
    public function __invoke(
        Request $request,
    ): array {
        // Get all active schemes
        return SchemesCollectionAction::execute();
    }
}
