<?php

namespace App\Providers;

use Google_Service_Drive_Permission;
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
        $this->app->singleton('googlePermission', function ($app) {
            $newPermission = new Google_Service_Drive_Permission();
            $newPermission->setType('anyone');
            $newPermission->setRole('reader');
            return $newPermission;
        });

        $this->app->singleton('googleFolderId', function ($app) {
            $folderId = file_get_contents(public_path() . '/token.txt');
            return $folderId;
        });
    }
}
