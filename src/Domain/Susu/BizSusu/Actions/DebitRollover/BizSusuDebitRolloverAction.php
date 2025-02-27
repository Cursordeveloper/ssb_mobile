<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\DebitRollover;

use App\Services\Susu\Requests\BizSusu\DebitRollover\SusuServiceBizSusuDebitRolloverRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuDebitRolloverAction
{
    private SusuServiceBizSusuDebitRolloverRequest $susuServiceBizSusuDebitRolloverRequest;

    public function __construct(
        SusuServiceBizSusuDebitRolloverRequest $request
    ) {
        $this->susuServiceBizSusuDebitRolloverRequest = $request;
    }

    public function execute(
        Customer $customer,
        string $susu,
        array $request
    ): array {
        // Execute the SusuServiceBizSusuDebitRolloverRequest and return the response
        return $this->susuServiceBizSusuDebitRolloverRequest->execute(
            customer: $customer,
            susu: $susu,
            request: $request
        );
    }
}
