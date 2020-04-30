<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Fiverr\Events' => APP_PATH . '/common/events/',
    'Fiverr'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Fiverr\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Fiverr\Modules\User\Module' => APP_PATH . '/modules/user/Module.php',
    'Fiverr\Modules\Comment\Module' => APP_PATH . '/modules/comment/Module.php',
    'Fiverr\Modules\Order\Module' => APP_PATH . '/modules/order/Module.php',
    'Fiverr\Modules\Post\Module' => APP_PATH . '/modules/post/Module.php',
    'Fiverr\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
