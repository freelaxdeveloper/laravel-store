<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class BasketController extends Controller
{
    public function oformitZakaz()
    {
        $nova_poshta = new \App\Plugins\NovaPoshta;
        $regions = $nova_poshta->getRegions();

        return view('basket.oformit', compact('regions'));
    }

    public function oformitZakazPost(Request $request)
    {
        Validator::make($request->all(), [
            'first_last' => 'required',
            'phone' => 'required',
            'region' => 'required',
            'cities' => 'required',
            'offices' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ])->validate();

        return '=)';
    }
}
