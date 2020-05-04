<?php
declare(strict_types=1);

namespace Fiverr\Modules\Frontend\Controllers;

use Fiverr\Modules\Post\Models\Posts;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $sessions = $this->getDI()->getShared("session");

        if (!$sessions->has("user_id")) {
            return $this->response->redirect("/user");
        }

        $user_id = $this->getDI()->getShared("session")->get('user_id');

        $posts = Posts::find([
            'conditions' => 'user_id = :user_id:',
            'bind'       => [
                'user_id' => $user_id,
            ]
        ]);

        $this->view->posts = $posts;
    }

}

