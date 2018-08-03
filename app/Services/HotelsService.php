<?php

namespace App\Services;

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
     * @param array $filter
     * @return Hotel[]
     */
    public function search(array $filter) : array
    {
        $hotels = $this->hotelsRepository->getAll();

        $hotels = $this->hotelsRepository->search($hotels , $filter);

        $hotels = $this->hotelsRepository->sort($hotels , 'name');

        return $hotels;

    }


}