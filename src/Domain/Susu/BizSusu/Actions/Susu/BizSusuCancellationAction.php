<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Susu\SusuServiceBizSusuCancellationRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCancellationAction
{
    private SusuServiceBizSusuCancellationRequest $susuServiceBizSusuCancellationRequest;

    public function __construct(
        SusuServiceBizSusuCancellationRequest $susuServiceBizSusuCancellationRequest
    ) {
        $this->susuServiceBizSusuCancellationRequest = $susuServiceBizSusuCancellationRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Send the request and return the response
        return $this->susuServiceBizSusuCancellationRequest->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request
        );
    }
}
