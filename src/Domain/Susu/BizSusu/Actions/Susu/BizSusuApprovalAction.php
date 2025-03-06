<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Susu\SusuServiceBizSusuApprovalRequest;

final class BizSusuApprovalAction
{
    private SusuServiceBizSusuApprovalRequest $susuServiceBizSusuApprovalRequest;

    public function __construct(
        SusuServiceBizSusuApprovalRequest $susuServiceBizSusuApprovalRequest
    ) {
        $this->susuServiceBizSusuApprovalRequest = $susuServiceBizSusuApprovalRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Send the request and return the response
        return $this->susuServiceBizSusuApprovalRequest->execute(
            customer: auth()->user(),
            susu: $susu, request: $request);
    }
}
