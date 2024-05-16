<?php

declare(strict_types=1);

namespace Domain\Susu\Shared\Actions\Scheme;

use App\Services\Susu\Requests\Shared\SchemesRequest;

final class SchemesAction
{
    public static function execute(): array
    {
        // Execute the SchemesRequest
        return (new SchemesRequest)->execute();
    }
}
