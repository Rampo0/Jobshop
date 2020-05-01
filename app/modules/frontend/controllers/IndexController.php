<?php
declare(strict_types=1);

namespace Fiverr\Modules\Frontend\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $sessions = $this->getDI()->getShared("session");

        if (!$sessions->has("user_id")) {
            return $this->response->redirect("/user");
        }
    }

}

