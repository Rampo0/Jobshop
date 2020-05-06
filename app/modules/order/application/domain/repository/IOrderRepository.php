<?php

namespace Fiverr\Modules\Order\Repository;

use Fiverr\Modules\Order\Models\Orders;

interface IOrderRepository{
    public function findAllUser();
    public function findAllPost();
    public function findAllOrder();
    public function findRelatePost($user_id);
}

?>