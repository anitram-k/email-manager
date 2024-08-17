<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmailRepositoryInterface;
use App\Repositories\EmailRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmailRepositoryInterface::class, EmailRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
