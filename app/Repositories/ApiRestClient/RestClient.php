<?php

namespace App\Repositories\ApiRestClient;


interface RestClient
{
    /**
     * @return string
     */
    public function getData() : string ;

}