<?php


namespace Fiverr\Modules\Post\Services;

use Fiverr\Modules\Post\Models\Post;
use Fiverr\Modules\Post\Models\PostMapper;
use Fiverr\Modules\Post\InMemory\PostRepository;


class GetAllPostService{

    private $repository;

    public function __construct(PostRepository $repository){
        $this->repository = $repository;
    }

    public function execute(){
        try{
            $posts = $this->repository->findPosts();
            $ratings = $this->repository->findRatings();
            $post_mapper = new PostMapper($posts, $ratings);
            $all_posts = $post_mapper->get();
            return $all_posts;
        }catch (\Exception $exception){
            throw new \Exception();
        }
        return null;
    }

}


?>