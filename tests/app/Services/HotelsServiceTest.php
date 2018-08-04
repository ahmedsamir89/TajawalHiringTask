<?php

namespace Tests\app\Services;

use App\Entities\Filters\FilterWrapper;
use App\Entities\Filters\NameFilter;
use App\Entities\Filters\PriceFilter;
use App\Entities\Hotel;
use App\Repositories\HotelsRepository;
use App\Services\HotelsService;
use PHPUnit\Framework\TestCase;
use Tests\MockData\HotelsMockData;

class HotelsServiceTest extends TestCase
{
    /** @var  HotelsService */
    private $hotelsService;

    /** @var  Hotel */
    private $hotels;

    public function setUp()
    {
        $this->hotels = HotelsMockData::get();
        $hotelsRepository = $this->createMock(HotelsRepository::class);
        $this->hotelsService = new HotelsService($hotelsRepository);
    }

    public function testSearchForHotelsBySomeFilters()
    {
        $filterWrapper = new FilterWrapper();
        $filterWrapper->addFilter(new NameFilter());
        $filterWrapper->setSortBy(new PriceFilter());
        $hotels = $this->hotelsService->search($filterWrapper);
        $this->assertEmpty($hotels);

    }

}