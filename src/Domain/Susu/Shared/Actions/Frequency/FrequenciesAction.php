<?php

declare(strict_types=1);

namespace Domain\Susu\Shared\Actions\Frequency;

use App\Services\Susu\Requests\Shared\SusuServiceFrequenciesRequest;

final class FrequenciesAction
{
    public static function execute(): array
    {
        // Execute the FrequenciesRequest
        return (new SusuServiceFrequenciesRequest)->execute();
    }
}
