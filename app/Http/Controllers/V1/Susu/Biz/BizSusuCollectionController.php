<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Biz;

use App\Http\Controllers\Controller;
use Domain\Susu\Biz\Actions\BizSusuCollectionAction;

final class BizSusuCollectionController extends Controller
{
    public function __invoke(): array
    {
        // Execute and return the BizSusuCollectionAction
        return BizSusuCollectionAction::execute(customer: auth()->user());
    }
}
