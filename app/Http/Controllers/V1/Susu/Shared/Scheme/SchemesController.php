<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Shared\Scheme;

use App\Http\Controllers\Controller;
use Domain\Susu\Shared\Actions\Scheme\SchemesAction;
use Illuminate\Http\Request;

final class SchemesController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute the SchemesAction
        return SchemesAction::execute();
    }
}
