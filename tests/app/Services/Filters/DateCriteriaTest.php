<?php
namespace Tests\app\Services\Filters;


use App\Entities\Filters\DateFilter;
use App\Services\Filters\DateCriteria;
use Carbon\Carbon;
use Tests\MockData\HotelsMockData;

class DateCriteriaTest extends \TestCase
{
    /** @var  DateCriteria */
    private $dateCriteria;
    private $hotels;
    public function setUp()
    {
        parent::setUp();
        $this->hotels =  $this->hotels = HotelsMockData::get();
        $this->dateCriteria = new DateCriteria();
    }

    /**
     * @param string $from
     * @param string $to
     * @dataProvider providerTestHotelsMeetDateCriteria
     */
    public function testHotelsMeetDateCriteria(string $from , string $to){
        $filter = new DateFilter();
        $filter->setFrom( new Carbon($from));
        $filter->setTo(new Carbon($to));
        $filteredHotels = $this->dateCriteria->meetCriteria($this->hotels , $filter);
        if($from == '10-10-2020' && $to == '15-10-2020') {
            $this->assertCount(2 , $filteredHotels);
        }elseif($from == '25-10-2020' && $to == '10-11-2020') {
            $this->assertCount(1 ,$filteredHotels);
        }

    }

    public function providerTestHotelsMeetDateCriteria(){
        return [
            //from, to
            [  '10-10-2020', '15-10-2020' ],
            ['25-10-2020' , '10-11-2020']

        ];
    }


}