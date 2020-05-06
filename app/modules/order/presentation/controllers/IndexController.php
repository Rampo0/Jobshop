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

    public function uploadAction(){

        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

        $order = Orders::findFirst($this->request->getPost('order_id'));

        $file_name = "";
        if ($this->request->hasFiles() == true) {
            foreach ($this->request->getUploadedFiles() as $file) {
                $file->moveTo('files/order/' . $file->getName());
                $file_name = $file->getName();   
            }
        }

        $order->uploaded_file = "order/" . $file_name;
        $order->is_done = 1;
        $order->save();

        return $this->response->redirect("/order");
    }

    public function createAction(){

        if(!$this->security->checkToken()){
            echo "invalid csrf !!";
        }

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

