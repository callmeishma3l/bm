<?php

namespace App\ApiEntities;

class UserEntity implements iUser
{
    public $id = null;
    public $name = '';
    public $email = '';

    /**
     * UserEntity constructor.
     * @param $id
     * @param $name
     * @param $email
     */
    public function __construct($id, $name, $email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getPosts(){

    }
}
