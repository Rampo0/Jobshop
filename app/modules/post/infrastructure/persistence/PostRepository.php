<?php

namespace Fiverr\Modules\Post\InMemory;

use Fiverr\Modules\Post\Repository\IPostRepository;
use Fiverr\Modules\Post\Models\Posts;
use Fiverr\Modules\Post\Models\Post;
use Fiverr\Modules\Post\Models\Ratings;

class PostRepository implements IPostRepository {
    
    public function create(Post $post){
        $posts = new Posts();
        $posts->id = $post->id()->id();
        $posts->description = $post->description();
        $posts->file = $post->file();
        $posts->user_id = $post->user_id();
        $posts->save();
    }

    public function findPosts(){
        return Posts::find();
    }

    public function findRatings(){
        return Ratings::find();
    }

}


?>