<?php

namespace App\Http\Controllers\API\V1;

use App\Entities\Hotel;
use App\Exceptions\APIQueryParameterException;
use App\Http\Controllers\API\ApiController;
use App\Hydrators\FilterHydrator;
use App\Services\HotelsService;
use App\Transformers\HotelsTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;
use function MongoDB\BSON\toJSON;

class HotelsController extends ApiController
{
    /** @var  HotelsService */
    private $hotelsService;

    public function __construct()
    {
        /** @var HotelsService hotelsService */
        $this->hotelsService = app(HotelsService::class);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request) : JsonResponse
    {
        try {
            $filterWrapper = FilterHydrator::hydrate($request->toArray())[0];
            /** @var Hotel $hotels */
            $hotels = $this->hotelsService->search($filterWrapper);

        }catch (APIQueryParameterException $exception) {
            $errors = [
                'message' => $exception->getMessage(),
                'key' => $exception->getKey(),
                'value' => $exception->getValue()
            ];
            return $this->respondValidationErrors($errors);

        }catch (Exception $exception){
            Log::alert("Hotels API Request Exception", [
               'message' => $exception->getMessage(),
                'trace'  => $exception->getTraceAsString()
            ]);
            $this->respodInternalServerError([]);

        }
        return $this->respond(HotelsTransformer::transform($hotels));
    }

}