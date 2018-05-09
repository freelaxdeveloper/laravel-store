<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }
    public function routes(Request $request)
    {
        $role = $request->input('role');
        $routeCollection = collect(Route::getRoutes());

        $routes = $routeCollection->when($role, function ($query) use ($role) {
            return $query->where('action.roles', [$role]);
        })->sortBy('action.controller')->all();

        return view('admin.routes', compact('routes'));
    }
}
