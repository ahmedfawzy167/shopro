<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\SkuDetailsResource;
use App\Http\Resources\SkuResource;
use App\Models\Sku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function index()
    {
       $skus = Sku::paginate(4);

       if($skus){

       if(request('page') > $skus->lastPage()) {
         return response()->json(['message' => trans('page_not_found')],404);
       }

        return new SkuResource($skus);

      }

   }
    public function show($id){
        $sku = Sku::find($id);
        if($sku != null){
            return new SkuDetailsResource($sku);
        }
         else{
            return response()->json(['message' => trans('sku_not_found')],404);
        }
    }


}
