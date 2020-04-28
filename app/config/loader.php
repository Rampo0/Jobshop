<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Fiverr\Models' => APP_PATH . '/common/models/',
    'Fiverr'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Fiverr\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Fiverr\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
