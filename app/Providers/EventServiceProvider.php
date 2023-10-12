<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Customer\Events\Registration\CustomerActivatedEvent;
use Domain\Customer\Events\Registration\CustomerCreatedEvent;
use Domain\Customer\Events\Token\TokenCreatedEvent;
use Domain\Customer\Listeners\Registration\CustomerActivatedListener;
use Domain\Customer\Listeners\Registration\CustomerCreatedListener;
use Domain\Customer\Listeners\Token\CreateTokenListener;
use Domain\Customer\Listeners\Token\DeleteTokenListener;
use Domain\Customer\Listeners\Token\PublishTokenListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerCreatedEvent::class => [
            CustomerCreatedListener::class,
            CreateTokenListener::class,
        ],
        CustomerActivatedEvent::class => [
            CustomerActivatedListener::class,
            DeleteTokenListener::class,
        ],
        TokenCreatedEvent::class => [
            PublishTokenListener::class,
        ],
    ];

    public function boot(): void
    {
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
