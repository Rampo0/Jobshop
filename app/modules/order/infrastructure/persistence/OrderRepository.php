<?php

namespace Fiverr\Modules\Order\InMemory;

use Fiverr\Modules\Order\Repository\IOrderRepository;
use Fiverr\Modules\Order\Models\Orders;
use Fiverr\Modules\User\Models\Users;
use Fiverr\Modules\Post\Models\Posts;


class OrderRepository implements IOrderRepository {
    
    public function findAllUser(){
        return Users::find();
    }

    public function findAllPost(){
        return Posts::find();
    }

    public function findAllOrder(){
        return Orders::find();
    }

    public function findRelatePost($user_id){
        return Posts::find([
            'conditions' => 'user_id = :user_id:',
            'bind'       => [
                'user_id' => $user_id,
            ]
        ]);
    }

}


?>