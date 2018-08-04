<?php

namespace Tests\app\Hydrators;


use App\Entities\Hotel;
use App\Hydrators\HotelsHydrator;
use Tests\MockData\HotelsMockData;

class HotelsHydratorsTest extends \TestCase
{
    public function testHotelsHydratorCanHydrateListOfHotelsRowData()
    {
        $hotels = HotelsHydrator::hydrate(HotelsMockData::getListOfHotels());

        $this->assertCount(6 , $hotels);

        foreach ($hotels as $hotel){
            $this->assertInstanceOf(Hotel::class , $hotel);
        }

        foreach ($hotels as $index => $hotel) {
            $hotelRowData = HotelsMockData::getListOfHotels()[$index];
            $this->assertEquals($hotelRowData['name'], $hotel->getName());
            $this->assertEquals($hotelRowData['price'], $hotel->getPrice());
            $this->assertEquals($hotelRowData['city'], $hotel->getCity());

            foreach ($hotels[$index]->getAvailabilities() as $i => $availability) {
                $this->assertEquals($availability->getTo()->format('d-m-Y'), $hotelRowData['availability'][$i]['to']);
                $this->assertEquals($availability->getFrom()->format('d-m-Y'), $hotelRowData['availability'][$i]['from']);
            }
        }

    }

}