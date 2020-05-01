<?php

namespace Fiverr\Modules\Post\Models;

require_once __DIR__ . "/../../../../../../vendor/autoload.php";

use Ramsey\Uuid\Uuid;

class PostId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() 
    {
        return $this->id;
    }

    public function equals(PostId $postId)
    {
        return $this->id === $postId->id;
    }

}