<?php

namespace App\Services\Filters;

use App\Entities\Entity;
use App\Entities\Filters\Filter;

interface Criteria
{
    /**
     * @param Entity[] $entities
     * @param Filter $filter
     * @return Entity[]
     */
    public function meetCriteria(array $entities , Filter $filter) : array ;

}