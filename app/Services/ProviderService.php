<?php

namespace App\Services;

use App\Entities\Entity;

abstract class ProviderService
{
    /**
     * @param array $filter
     * @return Entity[]
     */
    abstract public function search(array $filter) : array ;

}