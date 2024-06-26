<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Collection;

use App\Services\Susu\Requests\PersonalSusu\Collection\PersonalSusuCollectionSummaryRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCollectionSummaryAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the PersonalSusuCollectionSummaryRequest
        return (new PersonalSusuCollectionSummaryRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
