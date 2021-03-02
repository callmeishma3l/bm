<?php

namespace App\ApiEntities;

class PostEntity implements iPost
{
    var $id = null;
    var $user_id = null;
    var $title = '';
    var $body = '';
    var $created_at = '';
    var $updated_at = '';

    public function __construct($id, $user_id, $title, $body, $created_at, $updated_at){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->body = $body;
        $this->created = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getUser(){

    }
}
