<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Susu\SusuServiceBizSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCreateAction
{
    private SusuServiceBizSusuCreateRequest $susuServiceBizSusuCreateRequest;

    public function __construct(
        SusuServiceBizSusuCreateRequest $susuServiceBizSusuCreateRequest
    ) {
        $this->susuServiceBizSusuCreateRequest = $susuServiceBizSusuCreateRequest;
    }

    public function execute(
        array $request
    ): array {
        // Execute the BizSusuCreateRequest
        return $this->susuServiceBizSusuCreateRequest->execute(
            customer: auth()->user(),
            request: $request
        );
    }
}
