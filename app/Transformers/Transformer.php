<?php

namespace App\Transformers;


use App\Entities\Entity;

interface Transformer
{
    /**
     * @param Entity[] $entities
     * @return array
     */
    public static function transform(array $entities) : array ;

}