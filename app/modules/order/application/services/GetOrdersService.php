<?php


namespace Fiverr\Modules\Order\Services;

use Fiverr\Modules\Order\Models\Orders;
use Fiverr\Modules\Order\Models\RelateOrders;
use Fiverr\Modules\Order\InMemory\OrderRepository;


class GetOrdersService{

    private $repository;

    public function __construct(OrderRepository $repository){
        $this->repository = $repository;
    }

    public function execute($user_id){
        try{
            $posts = $this->repository->findRelatePost($user_id);
            $orders = $this->repository->findAllOrder();
            $relate_post = new RelateOrders($posts , $orders);
            return $relate_post->get();
        }catch (\Exception $exception){
            throw new \Exception();
        }
        return null;
    }

}


?>