<?php

namespace DanieleTulone\MakeModel\Providers;

use DanieleTulone\MakeModel\Console\Commands\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;


class MakeModelServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Bootstrap any application services.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function boot() 
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModelMakeCommand::class
            ]);
        }
    }

    /**
     * Register any application services.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend('command.make.model', function () {
                return new ModelMakeCommand;
            });
        }
    }

    /**
     * Provides services.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function provides()
    {
        return [
            'command.make.model'
        ];
    }
}