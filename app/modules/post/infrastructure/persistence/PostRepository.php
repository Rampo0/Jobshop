<?php

namespace Fiverr\Modules\Post\InMemory;

use Fiverr\Modules\Post\Repository\IPostRepository;
use Fiverr\Modules\Post\Models\Posts;

class PostRepository implements IPostRepository {
    
    public function create($description, $file){
        $post = new Posts();
        $post->description = $description;
        $post->file = $file;
        $post->rating = 0;
        $post->save();
    }

}


?>