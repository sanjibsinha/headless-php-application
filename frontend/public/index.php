<?php

$config = require __DIR__ . '/../config/app.php';

require __DIR__ . '/../app/Api/ApiClient.php';
require __DIR__ . '/../app/Services/PostService.php';
require __DIR__ . '/../app/Services/AppService.php';

use App\Api\ApiClient;
use App\Services\PostService;
use App\Services\AppService;

$api = new ApiClient(
    $config['api']['base_url']
);

$postService = new PostService($api);
$appService = new AppService($api);

$posts = $postService->latest(6);
$apps = $appService->all();

require __DIR__ . '/../views/home.php';