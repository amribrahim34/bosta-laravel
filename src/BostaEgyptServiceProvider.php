<?php

namespace amribrahim34\BostaEgypt;

use Illuminate\Support\ServiceProvider;
use amribrahim34\BostaEgypt\BostaApi;
use Illuminate\Support\Facades\Log;

class BostaEgyptServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BostaApi::class, function ($app) {
            $apiKey = config('bosta-egypt.api_key');
            Log::info('Bosta Egypt API Key: ' . ($apiKey ? 'Set' : 'Not Set'));
            if (empty($apiKey)) {
                throw new \Exception('Bosta Egypt API key is not set in the configuration.');
            }
            return new BostaApi($apiKey);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bosta-egypt.php' => config_path('bosta-egypt.php'),
        ], 'config');
    }
}
