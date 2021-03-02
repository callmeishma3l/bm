<?php

namespace App\ApiEntities;

class GorestUserFactory implements iUserFactory
{
    public function createUser($data): UserEntity
    {
        $user = new UserEntity($data->id, $data->name, $data->email);
        return $user;
    }
}
