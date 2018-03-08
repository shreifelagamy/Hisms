<?php

namespace Shreifelagamy\Hisms;

use Illuminate\Support\ServiceProvider;

class HiSmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/hisms.php';
        $this->publishes([
            $configPath => config_path('hisms.php')
        ]);

        $this->mergeConfigFrom($configPath, 'hisms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hisms', function ($app) {
            $config = $app['config']['jawalbsms'] ?: $app['config']['jawalbsms::config'];
            $client = new HismsClient($config['Username'], $config['Password'], $config['SenderName']);
            return $client;
        });
    }

    public function provides()
    {
        return ['hisms'];
    }
}
