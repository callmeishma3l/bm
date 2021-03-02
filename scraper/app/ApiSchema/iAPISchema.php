<?php

namespace App\ApiSchema;

interface iAPISchema{
    public function fetch();
    public function getPayloadData();
    public function isResponseList();

//    public function getTotalEntities();
//    public function getPages();
//    public function getCurrentPage();
}
