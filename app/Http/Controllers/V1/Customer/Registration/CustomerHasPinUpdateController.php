<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\Pin\CustomerHasPinUpdateAction;
use Illuminate\Http\Request;

final class CustomerHasPinUpdateController extends Controller
{
    public function __invoke(Request $request): void
    {
        // Execute the CustomerUpdateAction
        CustomerHasPinUpdateAction::execute(request: $request->all());
    }
}
