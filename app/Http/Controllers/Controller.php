<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    public function fail($errors)
    {
        $errors = is_array($errors) ? $errors : [$errors];

        return response()->json([
            'success' => false,
            'errors' => $errors,
        ], 400);
    }
}
