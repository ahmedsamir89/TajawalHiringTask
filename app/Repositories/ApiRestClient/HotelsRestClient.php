<?php

namespace App\Repositories\ApiRestClient;

use App\Exceptions\ApiRestClientException;
use Illuminate\Support\Facades\Log;

class HotelsRestClient implements RestClient
{
    const ENDPOINT_URL = 'https://api.myjson.com/bins/tl0bp';

    /**
     * @return array
     * @throws ApiRestClientException
     */
    public function getData(): array
    {
        try{

            $result = file_get_contents(self::ENDPOINT_URL);
            return json_decode($result , true)['hotels'];

        }catch ( \Exception $exception){

            Log::emergency('Hotels data provider API Rest client Exception' , [
                'message' => $exception->getMessage(),
                'code'    => $exception->getCode(),
                'api_url' => self::ENDPOINT_URL,
                'trace'   => $exception->getTraceAsString()
            ]);
            return [];
        }
    }

}