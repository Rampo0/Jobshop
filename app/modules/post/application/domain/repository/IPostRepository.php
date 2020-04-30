<?php

namespace Fiverr\Modules\Post\Repository;

interface IPostRepository{
    public function create($description, $file);
}

?>