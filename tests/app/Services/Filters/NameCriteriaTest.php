<?php

namespace Tests\app\Services\Filters;


use App\Entities\Filters\NameFilter;
use App\Services\Filters\NameCriteria;
use Tests\MockData\HotelsMockData;

class NameCriteriaTest extends \TestCase
{
    /** @var  NameCriteria */
    private $nameCriteria;
    private $hotels;
    public function setUp()
    {
        parent::setUp();
        $this->hotels =  $this->hotels = HotelsMockData::get();
        $this->nameCriteria = new NameCriteria();
    }

    /**
     * @param string $hotelName
     * @dataProvider providerTestHotelsMeetHotelNameCriteria
     */
    public function testHotelsMeetHotelNameCriteria(string $hotelName)
    {
        $filter = new NameFilter();
        $filter->setValue($hotelName);
        $filteredHotels = $this->nameCriteria->meetCriteria($this->hotels, $filter);
        if($hotelName == 'NotFoundHotelName')
        {
            $this->assertEmpty( $filteredHotels);

        }else {
            $this->assertCount(1, $filteredHotels);
            $this->assertEquals($filteredHotels[0]->getName(), $filter->getValue());
        }
    }

    public function providerTestHotelsMeetHotelNameCriteria()
    {
        return [
            //name
            ['Media One Hotel'],
            ['Rotana Hotel'] ,
            ['Le Meridien'],
            ['Concorde Hotel'],
            ['NotFoundHotelName']
        ];
    }

}