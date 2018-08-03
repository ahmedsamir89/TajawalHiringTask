<?php

namespace App\Hydrators;

use App\Entities\Hotel;
use App\Entities\Availability;
use Carbon\Carbon;

class HotelsHydrator implements Hydrator
{

    /**
     * @param array $hotelsData
     * @return Hotel[]
     */
    public static function hydrate(array $hotelsData): array
    {
        $hotels = [];

        foreach ($hotelsData as $hotelData){
            $hotel = new Hotel();
            $hotel->setName($hotelData['name']);
            $hotel->setCity($hotelData['city']);
            $hotel->setPrice($hotelData['price']);

            /** @var Availability[] $availabilities */
            $availabilities = [];

            foreach ($hotelData['availability'] as $availabilityData){
                $availability = new Availability();
                $availability->setFrom(new Carbon($availabilityData['from']));
                $availability->setTo(new Carbon($availabilityData['to']));
                $availabilities[] = $availability;
            }
            $hotel->setAvailabilities($availabilities);
            $hotels[] = $hotel;
        }

        return $hotels;
    }

}