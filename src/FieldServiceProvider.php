<?php

namespace LaravelRotEbal\NovaBlocklyField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use LaravelRotEbal\GovNova\GovNova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('NovaBlocklyField', __DIR__.'/../dist/js/field.js');
            Nova::style('NovaBlocklyField', __DIR__.'/../dist/css/field.css');
            GovNova::media('blockly', __DIR__ . '/../dist/media/');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
