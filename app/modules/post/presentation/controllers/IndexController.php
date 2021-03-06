<?php
declare(strict_types=1);

namespace Fiverr\Modules\Post\Controllers;

use Fiverr\Modules\Post\Models\Posts;
use Fiverr\Modules\Post\Models\Ratings;
use Fiverr\Modules\Comment\Models\Comments;


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

        $file_name = "";
        if ($this->request->hasFiles() == true) {
            foreach ($this->request->getUploadedFiles() as $file) {
                $file->moveTo('files/' . $file->getName());
                $file_name = $file->getName();   
            }
        }

        $user_id = $this->getDI()->getShared("session")->get('user_id');
       
        try{

            $this->createPostService->execute(
                $this->request->getPost('description'),
                $file_name,
                $user_id
            );
    
        }catch (\Exception $e){
            echo "something error !!";
        }

        return $this->response->redirect('/post');
    }

    public function detailAction($post_id){
        $post = Posts::find([
            'conditions' => 'id = :post_id:',
            'bind'       => [
                'post_id' => $post_id,
            ]
        ]);

        $comments = Comments::find([
            'conditions' => 'post_id = :post_id:',
            'bind'       => [
                'post_id' => $post_id,
            ]
        ]);

        $this->view->comments = $comments;
        $this->view->post = $post;
    }

}

