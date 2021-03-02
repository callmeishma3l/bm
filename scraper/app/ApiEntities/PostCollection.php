<?php

namespace App\ApiEntities;

use App\ApiSchema\iAPISchema;

class PostCollection
{
    /** @var array UserFactory[] */
    var $users = [];

    public function addUsers(iAPISchema $parser){
        if (!$parser->isFetched()){
            $parser->fetch();
        }
        $this->users = $parser->getPayloadData();
    }
}
