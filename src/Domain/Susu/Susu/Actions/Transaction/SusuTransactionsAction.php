<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuServiceSusuTransactionsRequest;
use Illuminate\Http\Request;

final class SusuTransactionsAction
{
    private SusuServiceSusuTransactionsRequest $susuServiceSusuTransactionsRequest;

    public function __construct(
        SusuServiceSusuTransactionsRequest $susuServiceSusuTransactionsRequest
    ) {
        $this->susuServiceSusuTransactionsRequest = $susuServiceSusuTransactionsRequest;
    }

    public function execute(
        string $susu,
        Request $request
    ): array {
        // Execute and return the susu balance
        return $this->susuServiceSusuTransactionsRequest->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request
        );
    }
}
