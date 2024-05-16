<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Kyc;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\Kyc\KycAction;
use Illuminate\Http\Request;

final class KycController extends Controller
{
    public function __invoke(Request $request): array
    {
        // Execute and return the KycCollectionAction
        return KycAction::execute(customer: auth()->user());
    }
}
