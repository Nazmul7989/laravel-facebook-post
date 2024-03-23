# Laravel Facebook Page Post
![GitHub Downloads (all assets, all releases)](https://img.shields.io/github/downloads/Nazmul7989/laravel-facebook-post/total?style=plastic)
![GitHub License](https://img.shields.io/github/license/Nazmul7989/laravel-facebook-post?style=plastic)
![GitHub forks](https://img.shields.io/github/forks/Nazmul7989/laravel-facebook-post?style=plastic)
![GitHub Repo stars](https://img.shields.io/github/stars/Nazmul7989/laravel-facebook-post?style=plastic&color=yellow)


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
### How to generate access token?
1. At first create a business type facebook app. Create app from [Facebook Deveoper Panel](https://developers.facebook.com/)
2. Go to Facebook [Graph Api Explorer](https://developers.facebook.com/tools/explorer/)
3. Here you will see three select option:
- Meta App
- User or Page
- Permissions
4. `Meta App`: Here you will see all facebook app that you have created. Select your business type app from the dropdown list.
5. `User or Page`: Here you need to select page access token. Then it will redirect you to your facebook page list. Select your preferred page and give necessary permission.
6. `Permissions`: Please select the following permission from this permission list
- `pages_show_list`
- `pages_read_engagement`
- `pages_manage_engagement`
- `pages_manage_posts`
- `pages_read_user_content`

7. Finally click on the Generate Access Token button and it will generate temporary access token for one hour.
 
8. If you want to make this token as long lived, you need to go [Access Token Debugger](https://developers.facebook.com/tools/debug/accesstoken/). Insert the access  token and click on the `Debug` button. Then it will show token information. Scroll down and you will see `Extend Access Token`. Click on this button and it will generate long lived access token.Then copy the access token and use this as `FACEBOOK_ACCESS_TOKEN`

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
- You can update only the text of a post. Image is not updatable.
- Multiple image upload is not supported.
- Video upload is not supported


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

### See [Facebook Page Api](https://developers.facebook.com/docs/pages-api) for more details
