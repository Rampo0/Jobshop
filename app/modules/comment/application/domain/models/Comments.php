<?php

namespace Fiverr\Modules\Comment\Models;
use Phalcon\Mvc\Model;

class Comments extends Model{
    public $id;
    public $post_id;
    public $user_id;
    public $comment;
}

?>