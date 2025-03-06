<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Account;

use App\Services\Susu\Requests\GoalGetterSusu\Susu\SusuServiceGoalGetterSusuApprovalRequest;

final class GoalGetterSusuApprovalAction
{
    private SusuServiceGoalGetterSusuApprovalRequest $susuServiceGoalGetterSusuApprovalRequest;

    public function __construct(
        SusuServiceGoalGetterSusuApprovalRequest $susuServiceGoalGetterSusuApprovalRequest
    ) {
        $this->susuServiceGoalGetterSusuApprovalRequest = $susuServiceGoalGetterSusuApprovalRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Send the request and return the response
        return $this->susuServiceGoalGetterSusuApprovalRequest->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request
        );
    }
}
