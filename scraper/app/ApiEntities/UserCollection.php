<?php

namespace App\ApiEntities;

use App\ApiSchema\iAPISchema;
use ReflectionClass;
use App\ApiEntities\ReqresUserFactory;
use App\ApiEntities\GorestUserFactory;

class UserCollection
{
    /** @var UserEntity[] */
    public $users = [];

    public function addUsers(iAPISchema $parser){
        if (!$parser->isFetched()){
            $parser->fetch();
        }
        $parserReflect = new ReflectionClass($parser);
        $parserAPIName = explode('API', $parserReflect->getShortName())[0];

        /** @var iUserFactory $factoryClass */
        $factoryClassName = '\\App\ApiEntities\\'.$parserAPIName.'UserFactory';

        $factoryClass = new $factoryClassName();

        foreach ($parser->getPayloadData() as $data){
            $this->users[] = $factoryClass->createUser($data);
        }

        return $this;
    }
}
