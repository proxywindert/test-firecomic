<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $path =public_path();
            $client->setAuthConfig(public_path().'/c5.json');
            $client->setScopes(['https://www.googleapis.com/auth/drive']);
            $service = new \Google_Service_Drive($client);
            return $service;
        });
    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
