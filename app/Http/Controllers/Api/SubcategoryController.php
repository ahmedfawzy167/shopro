<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\SubcategoryDetailsResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::paginate(5);

        if($subcategories){

        if(request('page') > $subcategories->lastPage()) {
           return response()->json(['message' => trans('page_not_found')],404);
         }
          return new SubcategoryResource($subcategories);
      }
    }

    public function show($id){
        $subcategory = Subcategory::find($id);
        if($subcategory != null){
           return new SubcategoryDetailsResource($subcategory);
        }
        else{
            return response()->json(['message' => trans('subcategory_not_found')],404);
        }
    }


}
