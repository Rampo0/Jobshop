<?php
declare(strict_types=1);

namespace Fiverr\Modules\Post\Controllers;

use Fiverr\Modules\Post\Models\Posts;
use Fiverr\Modules\Post\Models\Ratings;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $posts = $this->getAllPostService->execute();
        $this->view->posts = $posts;
    }

    public function ratingAction(){
        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

        $user_id = $this->getDI()->getShared("session")->get('user_id');

        $rating = new Ratings();
        $rating->post_id =  $this->request->getPost('post_id');
        $rating->user_id = $user_id;
        $rating->rating =  $this->request->getPost('rating');
        $rating->save();

        return $this->response->redirect('/post');
    }

    public function createAction(){

        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }
       
        try{

            $this->createPostService->execute(
                $this->request->getPost('description'),
                $this->request->getPost('file')
            );
    
        }catch (\Exception $e){
            echo "something error !!";
        }

        return $this->response->redirect('/post');
    }

}

