<?php

namespace Tests\app\Services\Filters;


use App\Entities\Filters\PriceFilter;
use App\Services\Filters\PriceCriteria;
use Tests\MockData\HotelsMockData;

class PriceCriteriaTest extends \TestCase
{
    /** @var  PriceCriteria*/
    private $priceCriteria;
    private $hotels;
    public function setUp()
    {
        parent::setUp();
        $this->hotels =  $this->hotels = HotelsMockData::get();
        $this->priceCriteria = new PriceCriteria();
    }

    /**
     * @param float $from
     * @param float $to
     * @dataProvider providerTestHotelsMeetPriceCriteria
     */
    public function testHotelsMeetPriceCriteria(float $from , float $to){
        $filter = new PriceFilter();
        $filter->setFrom($from);
        $filter->setTo($to);
        $filteredHotels = $this->priceCriteria->meetCriteria($this->hotels , $filter);
        if($from == 500 && $to == 1000 )
        {
            $this->assertEmpty($filteredHotels);
        }elseif($from == 1.0 && $to == 200.0){
            $this->assertCount(6 ,$filteredHotels);
        }elseif($from == 80.6 && $to == 102.2){
            $this->assertCount(3 ,$filteredHotels);
        }

    }

    public function providerTestHotelsMeetPriceCriteria(){
        return [
            //from, to
            [  1, 200 ],
            [500, 1000],
            [80.6, 102.2],
        ];
    }


}