<?php

namespace App\Entities\Filters;


interface Filter
{

    /**
     * @return string
     */
    public function getName() : string;

}