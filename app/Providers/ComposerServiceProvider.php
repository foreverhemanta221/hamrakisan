<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('frontend.layout.banner','App\Http\ViewComposer\HomeComposer@getBanner');
        View::composer('frontend.layout.*','App\Http\ViewComposer\HomeComposer@getCategory');
        View::composer('frontend.index','App\Http\ViewComposer\HomeComposer@getFeatureProduct');
        View::composer('frontend.index','App\Http\ViewComposer\HomeComposer@getFeatureProduct');
        View::composer('frontend.index','App\Http\ViewComposer\HomeComposer@getFeatureVideo');
        View::composer('frontend.index','App\Http\ViewComposer\HomeComposer@getFeatureListing');
        View::composer('frontend.index','App\Http\ViewComposer\HomeComposer@getTrainings');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
