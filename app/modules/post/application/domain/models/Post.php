<?php

namespace Fiverr\Modules\Post\Models;

class Post{

    private $id;
    private $description;
    private $file;
    private $totalRating = 0;
    private $user_id;
    private $rating = [];

    public function __construct(PostId $id, $description , $file , $user_id)
    {
        $this->description = $description;
        $this->file = $file;
        $this->id = $id;
        $this->user_id = $user_id;
    }

    public function id(){
        return $this->id;
    }

    public function user_id(){
        return $this->user_id;
    }

    public function totalRating(){
        return $totalRating;
    }

    public function averageRating(){
        $total = 0;
        foreach ($this->rating as $rate) {
            $total+=$rate->rating;
        }
        
        if(count($this->rating) > 0){
            return $total/count($this->rating);
        }
        
        return 0;
    }

    public function description(){
        return $this->description;
    }

    public function file(){
        return $this->file;
    }

    public function appendRating($rate){
        array_push($this->rating , $rate);
    } 

    public static function createPost($description , $file , $user_id){
        return new Post(new PostId() , $description , $file, $user_id);
    }

}


?>