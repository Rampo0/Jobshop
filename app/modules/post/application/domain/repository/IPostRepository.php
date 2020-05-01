<?php

namespace Fiverr\Modules\Post\Repository;

use Fiverr\Modules\Post\Models\Post;

interface IPostRepository{
    public function create(Post $post);
    public function findPosts();
    public function findRatings();
}

?>