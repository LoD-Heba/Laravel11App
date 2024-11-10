<?php

namespace App\Http\Controllers;
use App\Traits\JsonResponse;
abstract class Controller
{
    use JsonResponse;
    function jsonControllerResponse($jsonBody,$httpCode,$success)
    {
        return $this->jsonResponse($jsonBody,$httpCode,$success);
    }
}
