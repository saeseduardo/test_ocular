<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function resopnseCreated($message, $data = [])
    {
        return response()->json([
            'statusCode' => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function resopnseOk($message, $data = [])
    {
        return response()->json([
            'statusCode' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data
        ]);
    }
}
