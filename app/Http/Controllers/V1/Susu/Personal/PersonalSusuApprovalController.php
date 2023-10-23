<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Susu\Personal\Actions\PersonalSusuApprovalAction;

final class PersonalSusuApprovalController extends Controller
{
    public function __invoke(
        PinApprovalRequest $request,
        string $susu,
    ): array {
        return PersonalSusuApprovalAction::execute(
            request: $request->validated(),
            susu_resource: $susu,
        );
    }
}
