<?php

namespace Tests\app\Services;

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

        $hotels = $this->hotelsService->search([]);

        $this->assertEmpty($hotels);
    }

}