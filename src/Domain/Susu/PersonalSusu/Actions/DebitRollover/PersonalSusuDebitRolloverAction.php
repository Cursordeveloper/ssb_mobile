<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\DebitRollover;

use App\Services\Susu\Requests\PersonalSusu\DebitRollover\SusuServicePersonalSusuDebitRolloverRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuDebitRolloverAction
{
    private SusuServicePersonalSusuDebitRolloverRequest $susuServicePersonalSusuDebitRolloverRequest;

    public function __construct(
        SusuServicePersonalSusuDebitRolloverRequest $request
    ) {
        $this->susuServicePersonalSusuDebitRolloverRequest = $request;
    }

    public function execute(
        Customer $customer,
        string $susu,
        array $request
    ): array {
        // Execute the SusuServicePersonalSusuDebitRolloverRequest and return the response
        return $this->susuServicePersonalSusuDebitRolloverRequest->execute(
            customer: $customer,
            susu: $susu,
            request: $request
        );
    }
}
