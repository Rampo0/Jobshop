<?php


namespace Fiverr\Modules\Post\Services;

use Fiverr\Modules\Post\InMemory\PostRepository;

class CreatePostService{

    private $repository;

    public function __construct(PostRepository $repository){
        $this->repository = $repository;
    }

    public function execute($description ,$file){
        try{
            $this->repository->create($description, $file);
        }catch (\Exception $exception){
            throw new \Exception();
        }
        
    }

}


?>