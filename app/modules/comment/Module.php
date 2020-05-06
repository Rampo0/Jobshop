<?php
declare(strict_types=1);

namespace Fiverr\Modules\Comment;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

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
            'Fiverr\Modules\Comment\Controllers' => __DIR__ . '/presentation/controllers/',
            'Fiverr\Modules\Comment\Models' => __DIR__ . '/application/domain/models/',
            'Fiverr\Modules\Comment\Forms' => __DIR__ . '/application/domain/forms/',
            'Fiverr\Modules\Comment\Repository' => __DIR__ . '/application/domain/repository/',
            'Fiverr\Modules\Comment\Services' => __DIR__ . '/application/services/',
            'Fiverr\Modules\Comment\InMemory' => __DIR__ . '/infrastructure/persistence/',
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

       

    }
}
