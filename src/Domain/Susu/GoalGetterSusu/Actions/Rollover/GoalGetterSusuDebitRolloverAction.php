<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\DebitRollover;

use App\Services\Susu\Requests\GoalGetterSusu\DebitRollover\SusuServiceGoalGetterSusuDebitRolloverRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuDebitRolloverAction
{
    private SusuServiceGoalGetterSusuDebitRolloverRequest $susuServiceGoalGetterSusuDebitRolloverRequest;

    public function __construct(
        SusuServiceGoalGetterSusuDebitRolloverRequest $request
    ) {
        $this->susuServiceGoalGetterSusuDebitRolloverRequest = $request;
    }

    public function execute(
        Customer $customer,
        string $susu,
        array $request
    ): array {
        // Execute the SusuServiceGoalGetterSusuDebitRolloverRequest and return the response
        return $this->susuServiceGoalGetterSusuDebitRolloverRequest->execute(
            customer: $customer,
            susu: $susu,
            request: $request
        );
    }
}
