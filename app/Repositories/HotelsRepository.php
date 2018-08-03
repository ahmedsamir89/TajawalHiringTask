<?php

namespace App\Repositories;

use App\Entities\Hotel;
use App\Repositories\ApiRestClient\HotelsRestClient;

class HotelsRepository extends ProviderRepository
{
    /** @var  HotelsRestClient */
    private $restClient;

    public function __construct(HotelsRestClient $restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * @param Hotel[] $entities
     * @param array $filter
     * @return Hotel[]
     */
    public function search(array $entities, array $filter): array
    {
        // TODO: Implement search() method.
    }

    /**
     * @return Hotel[]
     */
    public function getAll(): array
    {
       $hotelsJson =  $this->restClient->getData();
    }

    /**
     * @param Hotel[] $entities
     * @param string $key
     * @return Hotel[]
     */
    function sort(array $entities , string $key) : array
    {
        // TODO: Implement sort() method.

    }

}