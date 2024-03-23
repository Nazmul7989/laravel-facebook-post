<?php

namespace NazmulHasan\LaravelFacebookPost\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookPost extends Facade
{
    /**
     * @method static getPost()
     * @method static storePost($message)
     * @method static storePostWithPhoto($url, $message=null)
     * @method static updatePost($post_id, $message=null)
     * @method static deletePost($post_id)
     */

    protected static function getFacadeAccessor(): string
    {
        return 'fbpost';
    }

}
