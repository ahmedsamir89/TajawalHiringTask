<?php

namespace Tests\app\Repositories;

use App\Entities\Filters\NameFilter;
use App\Entities\Filters\PriceFilter;
use App\Entities\Hotel;
use App\Repositories\ApiRestClient\HotelsRestClient;
use App\Repositories\HotelsRepository;
use App\Services\Filters\CriteriaFactory;
use App\Services\Filters\NameCriteria;
use Tests\MockData\HotelsMockData;

class HotelsRepositoryTest extends \TestCase
{
    /** @var  HotelsRepository */
    private $hotelsRepository;

    /** @var  Hotel */
    private $hotels;

    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    private $restClientMockObject;

    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    private $criteriaFactoryMock;

    public function setUp()
    {
        parent::setUp();
        $this->hotels =  $this->hotels = HotelsMockData::get();
        $this->restClientMockObject = $this->createMock(HotelsRestClient::class);
        $this->criteriaFactoryMock = $this->createMock(CriteriaFactory::class);
        $this->hotelsRepository = new HotelsRepository($this->restClientMockObject , $this->criteriaFactoryMock);
    }

    public function testGetAllHotel(){
        $this->restClientMockObject->method('getData')
            ->willReturn(HotelsMockData::getListOfHotels());
        $hotels = $this->hotelsRepository->getAll();
        $this->assertCount(6, $hotels);
    }

    public function testSearchForHotelsByNameCriteria()
    {
        $nameFilter = new NameFilter();
        $nameFilter->setValue('Media One Hotel');

        $nameCriteria = new NameCriteria();

        $this->criteriaFactoryMock->method('make')
            ->willReturn($nameCriteria);

       $hotels =  $this->hotelsRepository->search($this->hotels , [$nameFilter] );

       $this->assertCount(1 , $hotels);
       $this->assertSame($hotels[0]->getName() , 'Media One Hotel');
    }

    public function testSortHotelsByName()
    {
        $nameFilter = new NameFilter();
        $nameFilter->setAscending(true);

        $hotels = $this->hotelsRepository->sort($this->hotels , $nameFilter);

        $this->assertCount(6 , $hotels);
        $this->assertEquals($hotels[0]->getName() , 'Concorde Hotel');
        $this->assertEquals($hotels[5]->getName() , 'Rotana Hotel');

        $nameFilter->setAscending(false);

        $hotels = $this->hotelsRepository->sort($this->hotels , $nameFilter);

        $this->assertCount(6 , $hotels);
        $this->assertEquals($hotels[5]->getName() , 'Concorde Hotel');
        $this->assertEquals($hotels[0]->getName() , 'Rotana Hotel');


    }

    public function testSortHotelsByPrice()
    {
        $priceFilter = new PriceFilter();
        $priceFilter->setAscending(true);

        $hotels = $this->hotelsRepository->sort($this->hotels , $priceFilter);

        $this->assertCount(6 , $hotels);
        $this->assertEquals($hotels[0]->getPrice() , 79.4);
        $this->assertEquals($hotels[5]->getPrice() , 111);



        $priceFilter->setAscending(false);

        $hotels = $this->hotelsRepository->sort($this->hotels , $priceFilter);

        $this->assertCount(6 , $hotels);
        $this->assertEquals($hotels[0]->getPrice() , 111);
        $this->assertEquals($hotels[5]->getPrice() , 79.4);


    }


}