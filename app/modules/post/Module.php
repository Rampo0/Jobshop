<?php
declare(strict_types=1);

namespace Fiverr\Modules\Post;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Fiverr\Modules\Post\Services\CreatePostService;
use Fiverr\Modules\Post\InMemory\PostRepository;

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
            'Fiverr\Modules\Post\Controllers' => __DIR__ . '/presentation/controllers/',
            'Fiverr\Modules\Post\Models' => __DIR__ . '/application/domain/models/',
            'Fiverr\Modules\Post\Forms' => __DIR__ . '/application/domain/forms/',
            'Fiverr\Modules\Post\Repository' => __DIR__ . '/application/domain/repository/',
            'Fiverr\Modules\Post\Services' => __DIR__ . '/application/services/',
            'Fiverr\Modules\Post\InMemory' => __DIR__ . '/infrastructure/persistence/',
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

        $di->setShared('createPostService', function(){
            return new CreatePostService(new PostRepository);
        });

    }
}
