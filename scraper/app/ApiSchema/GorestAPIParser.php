<?php

namespace App\ApiSchema;

use Illuminate\Support\Facades\Http;

class GorestAPIParser extends AbstractAPIParser implements iAPISchema
{
    public function __construct($URL)
    {
        $this->URL = $URL;
    }

    public function getTotalEntities()
    {
        return @$this->latestResponse->meta->pagination->total;
    }

    public function getTotalPages()
    {
        return @$this->latestResponse->meta->pagination->pages;
    }

    public function getCurrentPage()
    {
        return @$this->latestResponse->meta->pagination->page;
    }


}
