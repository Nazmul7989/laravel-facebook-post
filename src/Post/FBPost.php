<?php

namespace NazmulHasan\LaravelFacebookPost\Post;

use Illuminate\Support\Facades\Http;
use NazmulHasan\LaravelFacebookPost\Traits\Helper;

class FBPost
{
    use Helper;

    public function getPost()
    {
        $get_url = "https://graph.facebook.com/v19.0/{$this->page_id}/feed?access_token={$this->access_token}";
        $response = Http::get($get_url);

        if ($response->successful()) {
            $responseData = $response->json();
            return $responseData;
        } else {
            return $this->failureResponse($response->status(),$response->body());
        }
    }

    public function storePost($message)
    {
        if ($message == null) {
            return $this->failureResponse(422, 'Message is required' );
        }

        $post_url = "https://graph.facebook.com/v19.0/{$this->page_id}/feed?message={$message}&access_token={$this->access_token}";
        $response = Http::post($post_url);

        if ($response->successful()) {
            $responseData = $response->json();
            return $this->successResponse('Post created successfully', $responseData['id']);
        } else {
            return $this->failureResponse($response->status(),$response->body());
        }

    }

    public function storePostWithPhoto($url, $message=null)
    {
        if ($url == null) {
            return $this->failureResponse(422, 'URL is required' );
        }

        $photo_url = "https://graph.facebook.com/v19.0/{$this->page_id}/photos?url={$url}&message={$message}&access_token={$this->access_token}";
        $response = Http::post($photo_url);

        if ($response->successful()) {
            $responseData = $response->json();
            return $this->successResponse('Post created successfully', $responseData['post_id']);
        } else {
            return $this->failureResponse($response->status(),$response->body());
        }
    }

    public function updatePost($post_id, $message=null)
    {
        if ($message == null) {
            return $this->failureResponse(422, 'Message is required' );
        }

        if ($post_id == null) {
            return $this->failureResponse(422, 'Post ID is required' );
        }

        $checkRes = $this->checkID($post_id);

        if ($checkRes == false) {
            return $this->failureResponse(422, 'Invalid Post ID' );
        }

        $update_url = "https://graph.facebook.com/v19.0/{$post_id}?message={$message}&access_token={$this->access_token}";
        $response = Http::post($update_url);

        if ($response->successful()) {
            return $this->successResponse('Post updated successfully', $post_id);
        } else {
            return $this->failureResponse($response->status(),$response->body());
        }
    }

    public function deletePost($post_id)
    {
        if ($post_id == null) {
            return $this->failureResponse(422, 'Post ID is required' );
        }

        $checkRes = $this->checkID($post_id);

        if ($checkRes == false) {
            return $this->failureResponse(422, 'Invalid Post ID' );
        }

        $delete_url = "https://graph.facebook.com/v19.0/{$post_id}?access_token={$this->access_token}";
        $response = Http::delete($delete_url);

        if ($response->successful()) {
            return $this->successResponse('Post deleted successfully', $post_id);
        } else {
            return $this->failureResponse($response->status(),$response->body());
        }
    }


}
