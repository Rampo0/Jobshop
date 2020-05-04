<?php

namespace Fiverr\Modules\Post\Models;

class PostMapper{ 

    private $all_posts = [];

    public function __construct($posts, $ratings)
    {
        foreach ($posts as $post)
        {
            $postId = new PostId($post->id);
            $this->all_posts[$post->id] = new Post($postId, $post->description, $post->file, $post->user_id);
        }

        foreach ($ratings as $rating)
        {
            $post = $this->all_posts[$rating->post_id];
            $post->appendRating($rating);
            $this->all_posts[$rating->post_id] = $post;
        }
    }

    public function get(){
        return $this->all_posts;
    }

}


?>