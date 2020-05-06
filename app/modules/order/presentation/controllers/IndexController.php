<?php
declare(strict_types=1);

namespace Fiverr\Modules\Order\Controllers;

use Fiverr\Modules\Order\Models\Orders;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $user_id = $this->getDI()->getShared("session")->get('user_id');
        $orders = $this->getOrdersService->execute($user_id);
        $this->view->orders = $orders;
        return $orders;
    }

    public function createAction(){
        $user_id = $this->getDI()->getShared("session")->get('user_id');
        $post_id = $this->request->getPost('post_id');

        $order = new Orders();
        $order->post_id = $this->request->getPost('post_id');
        $order->user_id = $user_id;
        $order->is_done = 0;
        $order->order_description = $this->request->getPost('order_description');
        $order->save();

        return $this->response->redirect("/post/index/detail/$post_id");
    }

}

