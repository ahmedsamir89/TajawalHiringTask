<?php

namespace App\Transformers;


use App\Entities\Hotel;

class HotelsTransformer implements Transformer
{
    /**
     * @param Hotel[] $hotels
     * @return array
     */
    public static function transform(array $hotels): array
    {
        $transformedData = [];
        foreach ($hotels as $index => $hotel){
            $transformedData[] = [
                'name'  => $hotel->getName(),
                'city'  => $hotel->getCity(),
                'price' => $hotel->getPrice(),
                ];
            foreach ($hotel->getAvailabilities() as $availability){
               $transformedData[$index]['availability'][] = [
                   'from' => $availability->getFrom()->format('d-m-Y'),
                   'to'   => $availability->getTo()->format('d-m-Y')
               ];
            }
        }

        return $transformedData;
    }

}