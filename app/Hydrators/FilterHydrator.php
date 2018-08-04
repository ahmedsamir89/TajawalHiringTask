<?php

namespace App\Hydrators;


use App\Entities\Filters\CityFilter;
use App\Entities\Filters\DateFilter;
use App\Entities\Filters\Filter;
use App\Entities\Filters\FilterWrapper;
use App\Entities\Filters\NameFilter;
use App\Entities\Filters\PriceFilter;
use App\Exceptions\APIQueryParameterException;
use Carbon\Carbon;

class FilterHydrator implements Hydrator
{

    /**
     * @param array $data
     * @return FilterWrapper[]
     * @throws APIQueryParameterException
     */
    public static function hydrate(array $data): array
    {
        $filters = [];
        $filterWrapper = new FilterWrapper();
        $ascending = isset($data['ascending']) && $data['ascending'] ? true : false;
        if(isset($data['name'])) {
            $filter = new NameFilter();
            $filter->setValue($data['name']);
            $filters[] = $filter;
        }

        if(isset($data['city'])) {
            $filter = new CityFilter();
            $filter->setValue($data['city']);
            $filters[] = $filter;
        }

        if(isset($data['price_range'])) {
            $filter = new PriceFilter();
            try {
                $range = explode(':' , $data['price_range']);
                $filter->setFrom($range[0]);
                $filter->setTo($range[1]);
            }catch (\Exception $exception) {
                throw new APIQueryParameterException('price_range', $data['price_range']);
            }
            $filters[] = $filter;
        }

        if(isset($data['date_range'])) {
            $filter = new DateFilter();
            try {
                $range = explode(':' , $data['date_range']);
                $filter->setFrom(new Carbon($range[0]));
                $filter->setTo(new Carbon($range[1]));
            }catch (\Exception $exception) {
                throw new APIQueryParameterException('date_range', $data['date_range']);
            }
            $filters[] = $filter;
        }

        $filterWrapper->setFilters($filters);
        if(isset($data['sort_by'])) {
            if( !in_array($data['sort_by'] , ['name' , 'price']) ) {
                throw new APIQueryParameterException('sort_by', $data['sort_by']);
            }

           switch ($data['sort_by']) {
               case 'name' :
                   $filter = new NameFilter();
                   $filter->setAscending($ascending);
                   break;

               case 'price':
                   $filter = new PriceFilter();
                   $filter->setAscending($ascending);
                   break;

           }

           $filterWrapper->setSortBy($filter);
        }
        return [$filterWrapper];
    }
}