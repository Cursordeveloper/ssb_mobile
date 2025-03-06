<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Account;

use App\Services\Susu\Requests\GoalGetterSusu\Susu\SusuServiceGoalGetterSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuCollectionAction
{
    private SusuServiceGoalGetterSusuCollectionRequest $susuServiceGoalGetterSusuCollectionRequest;

    public function __construct(
        SusuServiceGoalGetterSusuCollectionRequest $susuServiceGoalGetterSusuCollectionRequest
    ) {
        $this->susuServiceGoalGetterSusuCollectionRequest = $susuServiceGoalGetterSusuCollectionRequest;
    }

    public function execute(
    ): array {
        // Execute and return the GoalGetterSusuCollectionRequest
        return $this->susuServiceGoalGetterSusuCollectionRequest->execute(
            customer: auth()->user()
        );
    }
}
