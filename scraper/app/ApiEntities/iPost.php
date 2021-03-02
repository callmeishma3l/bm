<?php

namespace App\ApiEntities;

interface iPost
{
    public function __construct($id, $user_id, $title, $body, $created_at, $updated_at);
}
