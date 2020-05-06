<?php

namespace Fiverr\Modules\Order\Models;
use Phalcon\Mvc\Model;

class RelateOrders{

    private $relateOrders = [];
    private $post_map = [];

    public function __construct($posts, $orders)
    {
        foreach ($posts as $post) {
            $this->post_map[$post->id] = $post->id;
        }

        foreach ($orders as $order) {
            if ($this->post_map[$order->post_id]){
                array_push($this->relateOrders , $order);
            }
        }
    }

    public function get(){
        return $this->relateOrders;
    }

}

?>