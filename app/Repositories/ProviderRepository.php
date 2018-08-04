<?php

namespace App\Repositories;


use App\Entities\Entity;
use App\Entities\Filters\Filter;

abstract class ProviderRepository
{
    /**
     * @param Entity[] $entities
     * @param array $filter
     * @return Entity[]
     */
    abstract public function search(array $entities , array $filter) : array ;

    /**
     * @return Entity[]
     */
    abstract public function getAll() : array ;

    /**
     * @param Entity[] $entities
     * @param Filter $filter
     * @return Entity[]
     */
    abstract function sort(array $entities , Filter $filter) : array ;
}