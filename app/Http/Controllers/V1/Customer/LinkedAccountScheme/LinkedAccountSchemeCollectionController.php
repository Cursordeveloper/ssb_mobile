<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\LinkedAccountScheme;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\LinkedAccountSchemes\LinkAccountSchemesCollectionAction;
use Illuminate\Http\Request;

final class LinkedAccountSchemeCollectionController extends Controller
{
    public function __invoke(
        Request $request,
    ): array {
        return LinkAccountSchemesCollectionAction::execute();
    }
}
