<?php

namespace NazmulHasan\LaravelFacebookPost\Post;

use NazmulHasan\LaravelFacebookPost\Traits\Helper;

class FBPost
{
    use Helper;

    private $page_id;
    private $access_token;

    public function __construct()
    {
        $this->page_id = config('facebook.page_id');
        $this->access_token = config('facebook.access_token');
    }

    public function getPost()
    {

    }

    public function storePost(string $message)
    {

    }

    public function storePostWithPhoto(string $url, string $message=null)
    {

    }

    public function updatePost(string $id, string $message=null)
    {

    }

    public function deletePost(string $id)
    {

    }

    private function successResponse(string $message, string $post_id=null)
    {
        return [
            'status' => 'success',
            'status_code' => 200,
            'message' => $message,
            'post_id' => $post_id,
        ];
    }

    private function failureResponse(string $message)
    {
        return [
            'status' => 'fail',
            'status_code' => 400,
            'message' => $message,
        ];
    }
}
