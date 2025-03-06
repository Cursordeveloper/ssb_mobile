<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Account;

use App\Services\Susu\Requests\GoalGetterSusu\Susu\SusuServiceGoalGetterSusuCancellationRequest;

final class GoalGetterSusuCancellationAction
{
    private SusuServiceGoalGetterSusuCancellationRequest $susuServiceGoalGetterSusuCancellationRequest;

    public function __construct(
        SusuServiceGoalGetterSusuCancellationRequest $susuServiceGoalGetterSusuCancellationRequest
    ) {
        $this->susuServiceGoalGetterSusuCancellationRequest = $susuServiceGoalGetterSusuCancellationRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Send the request and return the response
        return $this->susuServiceGoalGetterSusuCancellationRequest->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request
        );
    }
}
