<?php

namespace Alan01777\LaravelChatwoot;

use Illuminate\Support\ServiceProvider;

class ChatwootServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/chatwoot.php', 'chatwoot');

        $this->app->singleton(ChatwootManager::class, function ($app) {
            return new ChatwootManager($app);
        });

        $this->app->singleton(\Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface::class, function ($app) {
            return $app->make(ChatwootManager::class)->account();
        });
    }



    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/chatwoot.php' => config_path('chatwoot.php'),
            ], 'chatwoot-config');
        }
    }
}
