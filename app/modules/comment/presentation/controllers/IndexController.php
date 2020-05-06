<?php
declare(strict_types=1);

namespace Fiverr\Modules\Comment\Controllers;

use Fiverr\Modules\Comment\Models\Comments;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function createAction(){

        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

        $post_id = $this->request->getPost('post_id');

        $user_id = $this->getDI()->getShared("session")->get('user_id');
        $comment = new Comments();
        $comment->post_id = $post_id;
        $comment->user_id = $user_id;
        $comment->comment = $this->request->getPost('comment');
        $comment->save();

        return $this->response->redirect("/post/index/detail/$post_id");
    }

}

