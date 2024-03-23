<?php

namespace NazmulHasan\LaravelFacebookPost\Traits;

trait Helper
{
    private $page_id;
    private $access_token;

    public function __construct()
    {
        $this->page_id = config('facebook.page_id');
        $this->access_token = config('facebook.access_token');
    }

    public function checkID($id)
    {
        if (is_string($id)) {
            return true;
        }else{
            return  false;
        }
    }

    public function successResponse(string $message, string $post_id=null)
    {
        return [
            'status' => 'success',
            'status_code' => 200,
            'message' => $message,
            'post_id' => $post_id,
        ];
    }

    public function failureResponse($code,string $message)
    {
        return [
            'status' => 'fail',
            'status_code' => $code,
            'message' => $message,
        ];
    }

}
