<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Susu\SusuServiceBizSusuRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAction
{
    private SusuServiceBizSusuRequest $susuServiceBizSusuRequest;

    public function __construct(
        SusuServiceBizSusuRequest $susuServiceBizSusuRequest
    ) {
        $this->susuServiceBizSusuRequest = $susuServiceBizSusuRequest;
    }

    public function execute(
        string $susu,
        array $request
    ): array {
        // Execute the BizSusuCreateRequest
        return $this->susuServiceBizSusuRequest->execute(
            customer: auth()->user(),
            susu: $susu
        );
    }
}
