<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Mobile\Events\Password\ChangePasswordConfirmationEvent;
use Domain\Mobile\Events\Password\PasswordResetConfirmationEvent;
use Domain\Mobile\Events\Registration\CustomerActivatedEvent;
use Domain\Mobile\Events\Registration\CustomerCreatedEvent;
use Domain\Mobile\Events\Token\TokenCreatedEvent;
use Domain\Mobile\Listeners\Password\ChangePasswordConfirmationListener;
use Domain\Mobile\Listeners\Password\PasswordResetConfirmationListener;
use Domain\Mobile\Listeners\Password\PasswordResetRequestListener;
use Domain\Mobile\Listeners\Registration\CustomerActivatedListener;
use Domain\Mobile\Listeners\Registration\CustomerCreatedListener;
use Domain\Mobile\Listeners\Token\CreateTokenListener;
use Domain\Mobile\Listeners\Token\DeleteTokenListener;
use Domain\Mobile\Listeners\Token\PublishTokenListener;
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
            PasswordResetRequestListener::class,
        ],
        ChangePasswordConfirmationEvent::class => [
            ChangePasswordConfirmationListener::class,
        ],
        PasswordResetConfirmationEvent::class => [
            PasswordResetConfirmationListener::class,
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
