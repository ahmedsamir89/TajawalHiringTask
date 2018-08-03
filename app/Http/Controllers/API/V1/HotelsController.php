<?php

namespace App\Http\Controllers\API\V1;

use App\Entities\Hotel;
use App\Http\Controllers\API\ApiController;
use App\Services\HotelsService;
use App\Transformers\HotelsTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
        /** @var Hotel $hotels */
        $hotels = $this->hotelsService->search($request->toArray());

        return $this->respond(HotelsTransformer::transform($hotels));
    }

}