<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Customer\Models\Customer;
use Domain\Customer\Observers\CustomerObserver;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Customer::observe(classes: CustomerObserver::class);
    }
}
