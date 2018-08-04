<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /** @var int $status */
    protected $status = 200;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return ApiController
     */
    public function setStatus(int $status) : ApiController
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param  nullable array $data
     * @param  nullable array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond(?array $data=[], ?array $headers = []): JsonResponse
    {
        return Response()->json($data, $this->getStatus(), $headers);
    }

    /**
     * @param $errors
     * @return JsonResponse
     */
    public function respondValidationErrors($errors): JsonResponse
    {
        if (is_array($errors)) {
            return $this->setStatus(422)->respond($errors);
        } else {
            return $this->setStatus(422)->respond($errors->toArray());
        }
    }

    /**
     * @param $errors
     * @return JsonResponse
     */
    public function respodInternalServerError($errors) : JsonResponse
    {
        if (is_array($errors)) {
            return $this->setStatus(500)->respond($errors);
        } else {
            return $this->setStatus(500)->respond($errors->toArray());
        }
    }

}