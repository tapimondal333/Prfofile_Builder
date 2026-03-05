<?php

namespace App\Providers;

use App\Models\Doccument;
use App\Policies\DocumentPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Doccument::class, DocumentPolicy::class);
    }
}
