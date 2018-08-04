<?php

namespace App\Services;

use App\Entities\Entity;
use App\Entities\Filters\FilterWrapper;

abstract class ProviderService
{
    /**
     * @param FilterWrapper $filter
     * @return Entity[]
     */
    abstract public function search(FilterWrapper $filter) : array ;

}