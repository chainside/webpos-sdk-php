<?php

namespace Chainside\SDK\WebPos\Laravel;


use Chainside\SDK\WebPos\ApiContext;
use Chainside\SDK\WebPos\ChainsideCallbacksHandler;
use Chainside\SDK\WebPos\Client;
use Illuminate\Support\ServiceProvider;
use Chainside\SDK\WebPos\Cache\IlluminateCacheWrapper;

class ChainsideWebPosSdkServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/config/chainside-sdk.php' => config_path('chainside-sdk.php')
        ], 'config');

    }

    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/config/chainside-sdk.php', 'chainside-sdk');

        $this->app->bind('chainside.sdk.webpos', function ($app) {

            $cache = new IlluminateCacheWrapper($app['cache.store']);
            return new Client($app['config']['chainside-sdk']['webpos'], $cache);

        });

        $this->app->bind('chainside.sdk.webpos.callback.handler', function($app) {

            $cache = new IlluminateCacheWrapper($app['cache.store']);
            $context = new ApiContext($app['config']['chainside-sdk']['webpos'], $cache);
            return new ChainsideCallbacksHandler($context);

        });

    }

}