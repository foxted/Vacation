<?php

namespace WiderFunnel\Providers;

use Illuminate\Support\ServiceProvider;
use WiderFunnel\Observers\RoleObserver;
use WiderFunnel\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::observe(RoleObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
