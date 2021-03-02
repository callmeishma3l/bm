<?php

namespace App\ApiEntities;

interface iUser
{
    public function __construct($id, $name, $email);
}
