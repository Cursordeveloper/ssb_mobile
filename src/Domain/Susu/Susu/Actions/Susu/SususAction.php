<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuServiceSususRequest;

final class SususAction
{
    private SusuServiceSususRequest $susuServiceSususRequest;

    public function __construct(
        SusuServiceSususRequest $susuServiceSususRequest
    ) {
        $this->susuServiceSususRequest = $susuServiceSususRequest;
    }

    public function execute(
        array $request
    ): array {
        // Execute and return the SususRequest
        return $this->susuServiceSususRequest->execute(
            customer: auth()->user(),
        );
    }
}
