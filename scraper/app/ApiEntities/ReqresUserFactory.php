<?php

namespace App\ApiEntities;

class ReqresUserFactory implements iUserFactory
{
    public function createUser($data): UserEntity
    {
        $user = new UserEntity($data->id, $data->first_name . " " . $data->last_name, $data->email);
        return $user;
    }
}
