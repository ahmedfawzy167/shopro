<?php

namespace App\Http\Controllers\Api;
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

        return response()->json($skus);

      }

   }
    public function show($id){
        $sku = Sku::find($id);
        if($sku != null){
            return response()->json($sku);
        }
         else{
            return response()->json(['message' => trans('sku_not_found')],404);
        }
    }


}
