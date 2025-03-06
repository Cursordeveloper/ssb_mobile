<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Susu\SusuServiceBizSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCollectionAction
{
    private SusuServiceBizSusuCollectionRequest $susuServiceBizSusuCollectionRequest;

    public function __construct(
        SusuServiceBizSusuCollectionRequest $susuServiceBizSusuCollectionRequest
    ) {
        $this->susuServiceBizSusuCollectionRequest = $susuServiceBizSusuCollectionRequest;
    }

    public function execute(
    ): array {
        // Execute and return the SusuServiceBizSusuCollectionRequest
        return $this->susuServiceBizSusuCollectionRequest->execute(
            customer: auth()->user()
        );
    }
}
