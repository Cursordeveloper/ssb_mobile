<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Account;

use App\Services\Susu\Requests\GoalGetterSusu\Susu\SusuServiceGoalGetterSusuRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuAction
{
    private SusuServiceGoalGetterSusuRequest $susuServiceGoalGetterSusuRequest;

    public function __construct(
        SusuServiceGoalGetterSusuRequest $susuServiceGoalGetterSusuRequest
    ) {
        $this->susuServiceGoalGetterSusuRequest = $susuServiceGoalGetterSusuRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Execute the GoalGetterSusuCreateRequest
        return $this->susuServiceGoalGetterSusuRequest->execute(
            customer: auth()->user(),
            susu: $susu
        );
    }
}
