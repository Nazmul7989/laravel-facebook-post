<?php

namespace NazmulHasan\LaravelFacebookPost;

use Illuminate\Support\ServiceProvider;
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;
use NazmulHasan\LaravelFacebookPost\Post\FBPost;

class FacebookPostServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/facebook.php' => config_path('facebook.php'),
        ],'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/facebook.php', 'facebook');

        $this->app->bind('fbpost', function (){
            return new FBPost();
        });


    }

}
