<?php

namespace Tests\app\Hydrators;


use App\Entities\Filters\FilterWrapper;
use App\Hydrators\FilterHydrator;

class FilterHydratorTest extends \TestCase
{
    public function testSearchQueryHydrate()
    {
        $request = [
            'name' => 'Hotel Name',
            'city' => 'City name',
            'price_range' => '10:20' ,
            'date_range'  => '1-1-2018:2-2-2018',
            'sort_by'     => 'price',
            'ascending'   => 1
        ];

        $filterWrapper = FilterHydrator::hydrate($request)[0];

        $this->assertInstanceOf(FilterWrapper::class , $filterWrapper);
        $this->assertTrue($filterWrapper->getSortBy()->ascending());

        $this->assertCount(4 , $filterWrapper->getFilters());
        $this->assertEquals($filterWrapper->getSortBy()->getName() , 'price');
    }

    /**
     * @expectedException \App\Exceptions\APIQueryParameterException
     */
    public function testGetExceptionWhenWrongQueryData()
    {
        $request = [
            'name' => 'Hotel Name',
            'city' => 'City name',
            'price_range' => 'Wrong price range' ,
            'date_range'  => 'Wrong price range',
            'sort_by'     => 'price',
            'ascending'   => 1
        ];

        FilterHydrator::hydrate($request)[0];


    }
}