# Laravel Facebook Page Post
This package allow to create, update, delete and get posts from facebook page in laravel application

## Requirements

- PHP >=7.2
- Laravel >= 6

## Installation
You can install the package via composer:

```
composer require nazmulhasan/laravel-facebook-post
```
## Configuration
You can publish the configuration file `config/facebook.php` optionally by using the following command:
``` 
php artisan vendor:publish --provider="NazmulHasan\LaravelFacebookPost\FacebookPostServiceProvider" --tag="config"
```

Configure `.env` file
```
FACEBOOK_PAGE_ID=
FACEBOOK_ACCESS_TOKEN=
```
## Usage

### Get All posts
``` 
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;

$response = FacebookPost::getPost();
```

### Create Text post
``` 
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;

$message = 'Message from laravel application'

$response = FacebookPost::storePost($message);
```

### Create Text post with photo
``` 
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;

$message = 'Message from laravel application'; //message is optional
$url = 'Your image url';

$response = FacebookPost::storePostWithPhoto($url, $message)
```
### Update  post
``` 
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;

$message = 'Message from laravel application'
$post_id = 'Your post id';

$response = FacebookPost::updatePost($post_id, $message);
```

### Delete  post
``` 
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;

$post_id = 'Your post id';

$response = FacebookPost::deletePost($post_id);
```

### Example Success Response
``` 
array:4 [
  "status" => "success"
  "status_code" => 200
  "message" => "Post created successfully"
  "post_id" => "103408372435470_395802394384938"
]
```

### Example Failure Response
``` 
array:3 [
  "status" => "fail"
  "status_code" => 422
  "message" => "Message is required"
]
```

## Limitations
- You can update only text of a post. Image is not updatable.
- Multiple image upload is not supported.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
