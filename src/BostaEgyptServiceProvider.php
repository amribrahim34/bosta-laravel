<?php

namespace amribrahim34\BostaEgypt;

use Illuminate\Support\ServiceProvider;
use amribrahim34\BostaEgypt\BostaApi;

class BostaEgyptServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BostaApi::class, function ($app) {
            return new BostaApi(config('bosta-egypt.api_key'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bosta-egypt.php' => config_path('bosta-egypt.php'),
        ], 'config');
    }
}
