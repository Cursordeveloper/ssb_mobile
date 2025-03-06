<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuServiceSusuBalanceRequest;
use Domain\Mobile\Models\Customer;

final class SusuBalanceAction
{
    private SusuServiceSusuBalanceRequest $susuServiceSusuBalanceRequest;

    public function __construct(
        SusuServiceSusuBalanceRequest $susuServiceSusuBalanceRequest
    ) {
        $this->susuServiceSusuBalanceRequest = $susuServiceSusuBalanceRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Execute and return the susu balance
        return $this->susuServiceSusuBalanceRequest->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request
        );
    }
}
