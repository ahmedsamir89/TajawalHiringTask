<?php

namespace App\Services\Filters;


use App\Entities\Filters\DateFilter;
use App\Entities\Filters\Filter;
use App\Entities\Hotel;

class DateCriteria implements Criteria
{
    /**
     * @param Hotel[] $hotels
     * @param Filter|DateFilter $filter
     * @return Hotel[]
     */
    public function meetCriteria(array $hotels, Filter $filter): array
    {
        $filtered = [];
        foreach ($hotels as $hotel){
            $available = false;
            foreach ($hotel->getAvailabilities() as $availability)
            {
                if($availability->getFrom()->greaterThanOrEqualTo($filter->getFrom()) && $availability->getTo()->lessThanOrEqualTo($filter->getTo())) {
                     $available = true;
                     break;
                }
            }
            if($available) {
                $filtered[] = $hotel;
            }
        }
        return $filtered;
    }

}