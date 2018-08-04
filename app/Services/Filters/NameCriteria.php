<?php

namespace App\Services\Filters;


use App\Entities\Filters\Filter;
use App\Entities\Filters\NameFilter;
use App\Entities\Hotel;

class NameCriteria implements Criteria
{
    /**
     * @param Hotel[] $hotels
     * @param NameFilter|Filter $filter
     * @return Hotel[]
     */
    public function meetCriteria(array $hotels, Filter $filter): array
    {
        $filtered = [];
        foreach ($hotels as $hotel) {
            if( stripos($hotel->getName(), $filter->getValue()) === false  ) {
                continue;
            }
            $filtered[] = $hotel;
        }

        return $filtered;
    }

}