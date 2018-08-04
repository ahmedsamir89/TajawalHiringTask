<?php

namespace App\Repositories;

use App\Entities\Filters\Filter;
use App\Entities\Filters\FilterWrapper;
use App\Entities\Filters\SortFilter;
use App\Entities\Hotel;
use App\Hydrators\HotelsHydrator;
use App\Repositories\ApiRestClient\HotelsRestClient;
use App\Services\Filters\Criteria;
use App\Services\Filters\CriteriaFactory;

class HotelsRepository extends ProviderRepository
{
    /** @var  HotelsRestClient */
    private $restClient;

    /** @var CriteriaFactory $criteriaFactory */
    private $criteriaFactory;

    /**
     * HotelsRepository constructor.
     * @param HotelsRestClient $restClient
     * @param CriteriaFactory $factory
     */
    public function __construct(HotelsRestClient $restClient, CriteriaFactory $factory)
    {

        $this->restClient = $restClient;
        $this->criteriaFactory = $factory;
    }

    /**
     * @param Hotel[] $hotels
     * @param Filter[] $filters
     * @return Hotel[]
     */
    public function search(array $hotels, array $filters): array
    {
        foreach ($filters as $filter){
            $criteria = $this->criteriaFactory->make($filter);
            if ($criteria instanceof Criteria) {
                $hotels = $criteria->meetCriteria($hotels, $filter);
            }
        }

        return $hotels;
    }

    /**
     * @return Hotel[]
     */
    public function getAll(): array
    {
        $hotels = $this->restClient->getData();
        return HotelsHydrator::hydrate($hotels);
    }

    /**
     * @param Hotel[] $hotels
     * @param Filter|SortFilter $filter
     * @return Hotel[]
     */
    function sort(array $hotels , Filter $filter) : array
    {
        switch ($filter->getName()) {
            case FilterWrapper::PRICE_FILTER_NAME:
                return $this->sortByPrice($hotels, $filter->ascending());
            case FilterWrapper::NAME_FILTER_NAME:
                return $this->sortByName($hotels, $filter->ascending());
        }
    }

    /**
     * @param Hotel[] $hotels
     * @param bool $ascending
     * @return Hotel[]
     */
    private function sortByName(array $hotels , $ascending = true) : array
    {
        usort($hotels , function(Hotel $hotel1 , Hotel $hotel2) use($ascending){
            return strcmp($hotel1->getName() , $hotel2->getName()) * ($ascending ? 1 : -1);
        });

        return $hotels;
    }

    private function sortByPrice(array $hotels , $ascending = true )
    {
        usort($hotels , function(Hotel $hotel1 , Hotel $hotel2) use($ascending){
            return  $hotel1->getPrice() == $hotel2->getPrice() ? 0 :
                ($hotel1->getPrice() < $hotel2->getPrice() ? -1 : 1  ) * ($ascending ? 1 : -1) ;
        });

        return $hotels;
    }

}