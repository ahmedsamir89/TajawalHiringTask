<?php

namespace Tests\app\Services\Filters;


use App\Entities\Filters\CityFilter;
use App\Services\Filters\CityCriteria;
use Tests\MockData\HotelsMockData;

class CityCriteriaTest extends \TestCase
{
    /** @var  CityCriteria */
    private $cityCriteria;
    private $hotels;
    public function setUp()
    {
        parent::setUp();
        $this->hotels =  $this->hotels = HotelsMockData::get();
        $this->cityCriteria = new CityCriteria();
    }

    /**
     * @param string $city
     * @dataProvider providerTestHotelsMeetCityNameCriteria
     */
    public function testHotelsMeetCityNameCriteria(string $city)
    {
        $filter = new CityFilter();
        $filter->setValue($city);
        $filteredHotels = $this->cityCriteria->meetCriteria($this->hotels, $filter);
        if($city == 'NotFoundCity')
        {
            $this->assertEmpty( $filteredHotels);

        }else {
            $this->assertCount(1, $filteredHotels);
            $this->assertEquals($filteredHotels[0]->getCity(), $filter->getValue());
        }

    }

    public function providerTestHotelsMeetCityNameCriteria()
    {
        return [
             //city
            ['cairo'],
            ['dubai'],
            ['Vienna'],
            ['Manila'],
            ['NotFoundCity']
        ];
    }
}