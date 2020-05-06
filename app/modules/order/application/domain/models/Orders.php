<?php

namespace Fiverr\Modules\Order\Models;
use Phalcon\Mvc\Model;

class Orders extends Model{
    public $id;
    public $post_id;
    public $user_id;
    public $is_done;
    public $order_description;
    public $uploaded_file;
}

?>