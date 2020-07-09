<?php

namespace DanieleTulone\MakeModel\Providers;

use DanieleTulone\MakeModel\Console\Commands\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class BaseCrudServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
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
}