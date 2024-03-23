<?php

namespace NazmulHasan\LaravelFacebookPost\Facade;

use Illuminate\Support\Facades\Facade;

class LaravelFacebookPost extends Facade
{
    /**
     * @method static getPost()
     * @method static storePost(string $message)
     * @method static storePostWithPhoto(string $url, string $message=null)
     * @method static updatePost(string $id, string $message=null)
     * @method static deletePost(string $id)
     */

    protected static function getFacadeAccessor(): string
    {
        return 'fbpost';
    }

}
