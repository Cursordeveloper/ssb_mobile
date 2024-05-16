<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccountSchemes;

use App\Services\Customer\Requests\Scheme\CustomerServiceLinkedSchemesRequest;

final class LinkAccountSchemesAction
{
    public static function execute(): array
    {
        //Execute and return the CustomerServiceLinkedSchemesRequest
        return (new CustomerServiceLinkedSchemesRequest)->execute();
    }
}
