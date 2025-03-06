<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Rollover;

use App\Services\Susu\Requests\DailySusu\DebitRollover\SusuServiceDailySusuDebitRolloverRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuDebitRolloverAction
{
    private SusuServiceDailySusuDebitRolloverRequest $susuServiceDailySusuDebitRolloverRequest;

    public function __construct(
        SusuServiceDailySusuDebitRolloverRequest $request
    ) {
        $this->susuServiceDailySusuDebitRolloverRequest = $request;
    }

    public function execute(
        Customer $customer,
        string $susu,
        array $request
    ): array {
        // Execute the SusuServiceDailySusuDebitRolloverRequest and return the response
        return $this->susuServiceDailySusuDebitRolloverRequest->execute(
            customer: $customer,
            susu: $susu,
            request: $request
        );
    }
}
