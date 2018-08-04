<?php

namespace App\Services\Filters;

use App\Entities\Filters\CityFilter;
use App\Entities\Filters\Filter;
use App\Entities\Hotel;

class CityCriteria implements Criteria
{
    /**
     * @param Hotel[] $hotels
     * @param CityFilter|Filter $filter
     * @return Hotel[]
     */
    public function meetCriteria(array $hotels, Filter $filter): array
    {
        $filtered = [];
        foreach ($hotels as $hotel) {
            if( stripos($hotel->getCity(), $filter->getValue()) === false  ) {
                continue;
            }
            $filtered[] = $hotel;
        }

        return $filtered;
    }


}