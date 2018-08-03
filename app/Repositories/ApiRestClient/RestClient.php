<?php

namespace App\Repositories\ApiRestClient;


interface RestClient
{
    /**
     * @return array
     */
    public function getData() : array ;

}