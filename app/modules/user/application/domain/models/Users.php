<?php

namespace Fiverr\Modules\User\Models;
use Phalcon\Mvc\Model;

class Users extends Model{
    public $id;
    public $nickname;
    public $email;
    public $password;
    public $created_at;
}

?>