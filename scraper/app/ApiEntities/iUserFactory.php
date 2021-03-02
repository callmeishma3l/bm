<?php

namespace App\ApiEntities;

interface iUserFactory
{
    function createUser($data): UserEntity;
}
