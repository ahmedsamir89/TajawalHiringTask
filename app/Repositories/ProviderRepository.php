<?php

namespace App\Repositories;


use App\Entities\Entity;

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
     * @param string $key
     * @return Entity[]
     */
    abstract function sort(array $entities , string $key) : array ;
}