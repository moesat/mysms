<?php

namespace angelo\MySms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


        $this->publishes([
            __DIR__.'/config/mmsms.php' => config_path('mmsms.php'),
        ], 'mmsms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SmsService::class,function($app){
            $config=$app->make('config');
            $apisecret=$config->get('mmsms.secret');
            $apikey=$config->get('mmsms.apikey');
            $sender=$config->get('mmsms.sender');
            return new SmsService($apikey,$apisecret,$sender);
        });

        $this->mergeConfigFrom( __DIR__.'/config/mmsms.php', 'mmsms');
    }
}
