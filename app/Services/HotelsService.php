<?php

namespace App\Services;

use App\Entities\Filters\FilterWrapper;
use App\Entities\Hotel;
use App\Repositories\HotelsRepository;

class HotelsService extends ProviderService
{
    /** @var HotelsRepository $hotelsRepository  */
    private $hotelsRepository;

    /**
     * HotelsService constructor.
     * @param HotelsRepository $hotelsRepository
     */
    public function __construct(HotelsRepository $hotelsRepository)
    {
        $this->hotelsRepository = $hotelsRepository;
    }

    /**
     * @param FilterWrapper $filterWrapper
     * @return Hotel[]
     */
    public function search(FilterWrapper $filterWrapper) : array
    {
        $hotels = $this->hotelsRepository->getAll();

        $hotels = $this->hotelsRepository->search($hotels , $filterWrapper->getFilters());

        $hotels = $this->hotelsRepository->sort($hotels , $filterWrapper->getSortBy());

        return $hotels;

    }


}