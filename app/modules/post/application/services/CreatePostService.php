<?php


namespace Fiverr\Modules\Post\Services;

use Fiverr\Modules\Post\Models\Post;
use Fiverr\Modules\Post\InMemory\PostRepository;

class CreatePostService{

    private $repository;

    public function __construct(PostRepository $repository){
        $this->repository = $repository;
    }

    public function execute($description ,$file){
        try{
            $newPost = Post::createPost($description , $file);
            $this->repository->create($newPost);
        }catch (\Exception $exception){
            throw new \Exception();
        }
        
    }

}


?>