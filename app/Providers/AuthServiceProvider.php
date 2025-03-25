<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

// COMMENT: Since we're focusing on Authentication, it's better to have AuthServiceProvider (instead of AppServiceProvider)
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // COMMENT: ::routes() somehow cant be used (probably deprecated?), so we'll ignore the routes
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // COMMENT: It's better to put ::routes() in the boot method, so it's registered when the application is booted
        // Passport::routes();

        // COMMENT: To get all the default Passport routes, we need to register them
        // $this->registerPolicies();

        // COMMENT: Set the expiration time for the tokens
        Passport::tokensExpireIn(now()->addDays(15));

        // COMMENT: Set the expiration time for the refresh tokens
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
