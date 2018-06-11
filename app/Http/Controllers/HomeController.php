<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Product};
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 /*         $nova_poshta = new \App\Plugins\NovaPoshta;
        $regions = $nova_poshta->getRegions();
        $cities = $nova_poshta->getCities('db5c88de-391c-11dd-90d9-001a92567626');
        $offices = $nova_poshta->getOffices('a9522a7e-eaf5-11e7-ba66-005056b2fc3d');
 */
        /* foreach ( $cities as $city ) {
            echo "{$city->Description} ({$city->Ref})<br/>";
        } */
        /* foreach ( $offices as $office ) {
            echo "{$office->Description}<br/>";
        } */
        // b3debd00-89b4-11e3-b441-0050568002cf
        // dd($regions);
        
        $products = Product::orderBy('id', 'desc')->paginate(9);

        return view('home', compact('products'));
    }
}
