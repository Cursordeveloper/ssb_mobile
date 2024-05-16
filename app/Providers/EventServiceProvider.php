<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Mobile\Events\Password\PasswordChangeEvent;
use Domain\Mobile\Events\Password\PasswordResetEvent;
use Domain\Mobile\Events\Password\PasswordResetRequestEvent;
use Domain\Mobile\Events\Registration\RegistrationActivationEvent;
use Domain\Mobile\Events\Token\DeleteTokenEvent;
use Domain\Mobile\Listeners\Password\PasswordChangeListener;
use Domain\Mobile\Listeners\Password\PasswordResetListener;
use Domain\Mobile\Listeners\Password\PasswordResetRequestListener;
use Domain\Mobile\Listeners\Registration\RegistrationActivationListener;
use Domain\Mobile\Listeners\Token\DeleteTokenListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Registration events and listeners
        RegistrationActivationEvent::class => [
            RegistrationActivationListener::class,
        ],

        // Password reset events and listeners
        PasswordResetRequestEvent::class => [
            PasswordResetRequestListener::class,
        ],
        PasswordResetEvent::class => [
            PasswordResetListener::class,
            DeleteTokenListener::class,
        ],

        // Change password events and listeners
        PasswordChangeEvent::class => [
            PasswordChangeListener::class,
        ],

        // Other events and listeners
        DeleteTokenEvent::class => [
            DeleteTokenListener::class,
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
