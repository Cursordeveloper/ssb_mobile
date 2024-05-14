<?php

declare(strict_types=1);

namespace Domain\Susu\Shared\Actions\Duration;

use App\Services\Susu\Requests\Shared\DurationsRequest;

final class DurationsAction
{
    public static function execute(): array
    {
        // Execute the DurationsRequest
        return (new DurationsRequest)->execute();
    }
}
