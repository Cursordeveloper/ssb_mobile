<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Account;

use App\Services\Susu\Requests\GoalGetterSusu\Susu\SusuServiceGoalGetterSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuCreateAction
{
    private SusuServiceGoalGetterSusuCreateRequest $susuServiceGoalGetterSusuCreateRequest;

    public function __construct(
        SusuServiceGoalGetterSusuCreateRequest $susuServiceGoalGetterSusuCreateRequest
    ) {
        $this->susuServiceGoalGetterSusuCreateRequest = $susuServiceGoalGetterSusuCreateRequest;
    }

    public function execute(
        array $request
    ): array {
        // Execute the GoalGetterSusuCreateRequest
        return $this->susuServiceGoalGetterSusuCreateRequest->execute(
            customer: auth()->user(),
            request: $request
        );
    }
}
