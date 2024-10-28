<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\Registration\RegistrationCreatedAction;
use Illuminate\Http\Request;

final class RegistrationCreatedController extends Controller
{
    public function __invoke(Request $request): void
    {
        // Execute the RegistrationCreatedAction
        RegistrationCreatedAction::execute(data: $request->all());
    }
}
