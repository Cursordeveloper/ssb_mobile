<?php

declare(strict_types=1);

namespace App\Services\Notification\Requests\Password;

use App\Services\Notification\NotificationService;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Http;

final class PasswordResetConfirmationRequest
{
    public NotificationService $service;

    public function __construct()
    {
        $this->service = new NotificationService;
    }

    public function execute(Customer $customer): void
    {
        Http::withHeaders(['Content-Type' => 'application/vnd.api+json', 'Accept' => 'application/vnd.api+json'])->post(
            url: $this->service->base_url.'customers/'.$customer->resource_id.'/passwords/resets/confirmations',
            data: null
        )->json();
    }
}
