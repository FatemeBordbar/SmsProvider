<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use JetBrains\PhpStorm\NoReturn;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function response($status = true, $message = null, $data = null, $final_http_code = 200)
    {
        return response()->json(['success' => $status, 'message' => $message, 'data' => $data], $final_http_code)->send();
    }
}
