<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\User;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

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
            $user->api_key = Uuid::uuid4()->toString();
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
