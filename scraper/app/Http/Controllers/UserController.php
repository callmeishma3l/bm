<?php

namespace App\Http\Controllers;

use App\ApiEntities\UserCollection;
use App\ApiSchema\ReqresAPIParser;
use App\ApiSchema\GorestAPIParser;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index($id=null)
    {
        $apiUsersReqRes = new ReqresAPIParser('https://reqres.in/api/users/');
        $apiUsersGorest = (new GorestAPIParser('https://gorest.co.in/public-api/users'))->fetch(2); //dateset is too large here, showcase the single specific page loader

        $userCollection = new UserCollection();

        $userCollection = $userCollection->addUsers($apiUsersReqRes)->addUsers($apiUsersGorest)->users;
        return $userCollection;
    }
}
