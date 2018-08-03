<?php

namespace App\Services;

use App\Entities\Entity;

abstract class ProviderService
{
    /**
     * @param array $filter
     * @param string $sort_by
     * @param bool $ascending
     * @return Entity[]
     */
    abstract public function search(array $filter , $sort_by='name' , $ascending = true) : array ;

}