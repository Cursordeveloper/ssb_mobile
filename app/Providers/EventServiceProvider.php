<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Mobile\Events\Password\ChangePasswordConfirmationEvent;
use Domain\Mobile\Events\Password\PasswordResetConfirmationEvent;
use Domain\Mobile\Events\Registration\CustomerActivatedEvent;
use Domain\Mobile\Events\Registration\CustomerCreatedEvent;
use Domain\Mobile\Events\Registration\CustomerTokenEvent;
use Domain\Mobile\Listeners\Password\ChangePasswordConfirmationListener;
use Domain\Mobile\Listeners\Password\PasswordResetConfirmationListener;
use Domain\Mobile\Listeners\Registration\CustomerActivatedListener;
use Domain\Mobile\Listeners\Token\CreateRegistrationTokenListener;
use Domain\Mobile\Listeners\Token\DeleteTokenListener;
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
            CreateRegistrationTokenListener::class,
        ],
        CustomerTokenEvent::class => [
            CreateRegistrationTokenListener::class,
        ],
        CustomerActivatedEvent::class => [
            CustomerActivatedListener::class,
            DeleteTokenListener::class,
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
