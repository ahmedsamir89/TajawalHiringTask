<?php

namespace App\Services\Filters;


use App\Entities\Filters\CityFilter;
use App\Entities\Filters\Filter;
use App\Entities\Filters\FilterWrapper;

class CriteriaFactory
{
    /**
     * @param Filter $filter
     * @return Criteria
     */
    public function make(Filter $filter) : Criteria
    {
        switch ($filter->getName()) {
            case FilterWrapper::NAME_FILTER_NAME:
                return new NameCriteria();
                break;
            case FilterWrapper::CITY_FILTER_NAME:
                return new CityCriteria();
                break;
            case FilterWrapper::DATE_FILTER_NAME:
                return new DateCriteria();
                break;
            case FilterWrapper::PRICE_FILTER_NAME:
                return new PriceCriteria();
                break;
        }

    }

}