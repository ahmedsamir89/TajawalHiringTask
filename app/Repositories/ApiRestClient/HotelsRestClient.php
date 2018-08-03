<?php

namespace App\Repositories\ApiRestClient;

class HotelsRestClient implements RestClient
{
    const ENDPOINT_URL = 'https://api.myjson.com/bins/tl0bp';

    /**
     * @return string
     */
    public function getData(): string
    {
        try{
            $result = file_get_contents(self::ENDPOINT_URL);

            return json_encode($result , true)['hotels'];

        }catch ( \Exception $exception){


        }
    }

}