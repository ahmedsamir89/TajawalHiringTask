<?php

namespace App\Repositories;

use App\Entities\Hotel;
use App\Hydrators\HotelsHydrator;
use App\Repositories\ApiRestClient\HotelsRestClient;
use App\Hydrators\HotelsTransformer;
use App\Hydrators\Hydrator;

class HotelsRepository extends ProviderRepository
{
    /** @var  HotelsRestClient */
    private $restClient;

    public function __construct(HotelsRestClient $restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * @param Hotel[] $hotels
     * @param array $filter
     * @return Hotel[]
     */
    public function search(array $hotels, array $filter): array
    {

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
     * @param string $key
     * @return Hotel[]
     */
    function sort(array $hotels , string $key) : array
    {

        return $hotels;

    }

}