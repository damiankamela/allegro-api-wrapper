<?php

namespace App\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\ServiceProvider;

class GuzzleClientServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(ClientInterface::class, function ($app) {
            return new Client([
//                'base_uri' => 'https://allegro.pl/',
            ]);
        });
    }
}
