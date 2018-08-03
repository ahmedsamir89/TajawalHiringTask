<?php

namespace App\Hydrators;

interface Hydrator
{
    public static function hydrate(array $data) : array ;

}