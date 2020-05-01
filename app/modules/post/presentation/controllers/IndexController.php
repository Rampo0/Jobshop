<?php
declare(strict_types=1);

namespace Fiverr\Modules\Post\Controllers;

use Fiverr\Modules\Post\Models\Posts;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $posts = $this->getAllPostService->execute();
        $this->view->posts = $posts;
    }

    public function ratingAction(){

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

