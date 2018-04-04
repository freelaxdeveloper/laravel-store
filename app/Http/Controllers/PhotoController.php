<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function upload()
    {
        return view('photo.upload');
    }
    public function uploaded(Request $request)
    {
        $image = $request->json()->all();
        return $image;
    }
}
