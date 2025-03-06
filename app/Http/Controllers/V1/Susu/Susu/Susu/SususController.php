<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Susu;

use App\Http\Controllers\Controller;
use Domain\Susu\Susu\Actions\SususAction;
use Illuminate\Http\Request;

final class SususController extends Controller
{
    public function __invoke(
        Request $request,
        SususAction $sususAction
    ): array {
        // Execute the SususAction
        return $sususAction->execute(
            request: $request->all()
        );
    }
}
