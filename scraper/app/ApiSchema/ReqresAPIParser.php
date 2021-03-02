<?php

namespace App\ApiSchema;

use Illuminate\Support\Facades\Http;

class ReqresAPIParser extends AbstractAPIParser implements iAPISchema
{
    public function __construct($URL)
    {
        $this->URL = $URL;
    }

    public function getTotalEntities()
    {
        return @$this->latestResponse->total;
    }

    public function getTotalPages()
    {
        return @$this->latestResponse->total_pages;
    }

    public function getCurrentPage()
    {
        return @$this->latestResponse->page;
    }
}
