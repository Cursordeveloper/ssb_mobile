<?php

declare(strict_types=1);

namespace Domain\Shared\Action\Schemes;

use App\Services\SusuboxServices;

final class GetSchemesActions
{
    public static function execute(): array
    {
        // Get Schemes from Cache or

        // Get Schemes from ssb_customer_service
        $susubox = new SusuboxServices();
        return $susubox->getSchemes();
    }
}
