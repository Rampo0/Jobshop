<?php
declare(strict_types=1);

namespace Fiverr\Modules\Order;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Fiverr\Modules\Order\Services\GetOrdersService;
use Fiverr\Modules\Order\InMemory\OrderRepository;


class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Fiverr\Modules\Order\Controllers' => __DIR__ . '/presentation/controllers/',
            'Fiverr\Modules\Order\Models' => __DIR__ . '/application/domain/models/',
            'Fiverr\Modules\Order\Forms' => __DIR__ . '/application/domain/forms/',
            'Fiverr\Modules\Order\Repository' => __DIR__ . '/application/domain/repository/',
            'Fiverr\Modules\Order\Services' => __DIR__ . '/application/services/',
            'Fiverr\Modules\Order\InMemory' => __DIR__ . '/infrastructure/persistence/',
            'Fiverr\Modules\User\Models' => __DIR__ . '/../user/application/domain/models/',
            'Fiverr\Modules\Post\Models' => __DIR__ . '/../post/application/domain/models/',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });

        $di->setShared('getOrdersService', function(){
            return new GetOrdersService(new OrderRepository);
        });

    }
}
