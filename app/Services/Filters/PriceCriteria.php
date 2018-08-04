<?php

namespace App\Services\Filters;

use App\Entities\Filters\Filter;
use App\Entities\Filters\PriceFilter;
use App\Entities\Hotel;

class PriceCriteria implements Criteria
{
    /**
     * @param Hotel[] $hotels
     * @param PriceFilter|Filter $filter
     * @return Hotel[]
     */
    public function meetCriteria(array $hotels, Filter $filter): array
    {
        $filtered = [];
        foreach ($hotels as $hotel) {
            if($hotel->getPrice() <= $filter->getTo() && $hotel->getPrice() >= $filter->getFrom()) {
                $filtered[] = $hotel;
            }
        }

        return $filtered;
    }

}