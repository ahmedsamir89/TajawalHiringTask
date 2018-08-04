<?php

namespace App\Entities\Filters;


interface SortFilter extends Filter
{
    /**
     * @return bool
     */
    public function ascending() : bool ;
}