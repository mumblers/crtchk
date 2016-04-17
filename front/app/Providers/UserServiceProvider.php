<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\User;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::creating(function ($user) {
            $user->settings = [];
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
