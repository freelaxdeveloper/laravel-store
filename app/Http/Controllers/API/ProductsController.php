<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Category, Product};
use Validator;

class ProductsController extends Controller
{

  public function all(Request $request)
  {
    Validator::make($request->all(), [
      'limit' => 'integer|max:50',
    ])->validate();

    $limit = $request->limit ?? 15;

    $products = Product::paginate($limit);

    return $this->success($products);
  }

  public function product(Request $request, Product $product)
  {
    return $this->success($product);
  }

}
