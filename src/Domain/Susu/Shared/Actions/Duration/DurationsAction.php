<?php

declare(strict_types=1);

namespace Domain\Susu\Shared\Actions\Duration;

use App\Services\Susu\Requests\Shared\SusuServiceDurationsRequest;

final class DurationsAction
{
    public static function execute(): array
    {
        // Execute the DurationsRequest
        return (new SusuServiceDurationsRequest)->execute();
    }
}
