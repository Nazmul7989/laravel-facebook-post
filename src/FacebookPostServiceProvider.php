<?php

namespace NazmulHasan\LaravelFacebookPost;

use Illuminate\Support\ServiceProvider;
use NazmulHasan\LaravelFacebookPost\Post\FBPost;

class FacebookPostServiceProvider extends ServiceProvider
{

    public function boot()
    {

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/facebook.php', 'laravel-facebook-post');

        $this->app->bind('fbpost', function (){
            return new FBPost();
        });
    }

}
