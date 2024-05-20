<?php

declare(strict_types=1);

namespace App\Services\Notification\Requests\Registration;

use App\Services\Notification\NotificationService;
use Illuminate\Support\Facades\Http;

final class RegistrationVerificationRequest
{
    public NotificationService $service;

    public function __construct()
    {
        $this->service = new NotificationService;
    }

    public function execute(array $data): void
    {
        Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])
            ->post(url: $this->service->base_url.'customers/registrations/tokens', data: $data)
            ->json();
    }
}
