<?php

namespace App\Http\Controllers\Api;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::paginate(5);

        if($subcategories){

        if(request('page') > $subcategories->lastPage()) {
           return response()->json(["Page not found"],404);
       }
          return response()->json($subcategories);
      }
    }

    public function show($id){
        $subcategory = SubCategory::find($id);
        if($subcategory != null){
           return response()->json($subcategory);
        }
        else{
            return response()->json('Subcategory Not Found',404);
        }
    }


}
