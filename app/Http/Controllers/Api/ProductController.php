<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
       $products = Product::paginate(20);

       if($products){

        if(request('page') > $products->lastPage()) {
           return response()->json(['message' => trans('page_not_found')],404);
        }

         return new ProductResource($products);
     }

  }

  public function show($id){
    $product = Product::find($id);
    if($product != null){
        return new ProductDetailsResource($product);
    }
    else{
        return response()->json(['message' => trans('product_not_found')],404);
    }
}

}


