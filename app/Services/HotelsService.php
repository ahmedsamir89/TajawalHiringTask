<?php

namespace App\Services;

use App\Entities\Hotel;
use App\Repositories\HotelsRepository;

class HotelsService extends ProviderService
{
    /** @var HotelsService $hotelsRepository  */
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
     * @param string $sort_by
     * @param bool $ascending
     * @return Hotel[]
     */
    public function search(array $filter , $sort_by='name' , $ascending = true) : array
    {

    }


}