<?php

namespace App\Entities\Filters;


class FilterWrapper
{
    /** @var  Filter[] */
    private $filters;

    /** @var  Filter */
    private $sortBy;

    const NAME_FILTER_NAME  = 'name';
    const PRICE_FILTER_NAME = 'price';
    const CITY_FILTER_NAME  = 'city';
    const DATE_FILTER_NAME  = 'date';

        /**
     * @return Filter[]
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param Filter[] $filters
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return SortFilter | null
     */
    public function getSortBy(): ?SortFilter
    {
        return $this->sortBy;
    }

    /**
     * @param Filter $sortBy
     */
    public function setSortBy(Filter $sortBy)
    {
        $this->sortBy = $sortBy;
    }

    public function addFilter(Filter $filter)
    {
        if(is_null($this->filters)) {
            $this->filters = [];
        }

        $this->filters[] = $filter;
    }



}