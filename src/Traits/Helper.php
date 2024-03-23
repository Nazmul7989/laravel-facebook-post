<?php

namespace NazmulHasan\LaravelFacebookPost\Traits;

trait Helper
{
    public function checkUrl($url)
    {
        if (is_string($url)) {
            return true;
        }else{
            return  false;
        }
    }

}
