<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Summary;

use App\Services\Susu\Requests\DailySusu\Summary\SusuServiceDailySusuSummaryRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuCollectionSummaryAction
{
    private SusuServiceDailySusuSummaryRequest $susuServiceDailySusuSummaryRequest;

    public function __construct(
        SusuServiceDailySusuSummaryRequest $serviceDailySusuSummaryRequest
    ) {
        $this->susuServiceDailySusuSummaryRequest = $serviceDailySusuSummaryRequest;
    }

    public function execute(
        Customer $customer,
        string $susu,
        array $request
    ): array {
        // Execute the DailySusuCollectionSummaryRequest
        return $this->susuServiceDailySusuSummaryRequest->execute(
            customer: $customer,
            susu: $susu,
            request: $request
        );
    }
}
