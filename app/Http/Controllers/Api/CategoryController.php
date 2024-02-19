<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
         $categories = Category::paginate(2);

         if($categories){

         if(request('page') > $categories->lastPage()) {
            return response()->json(['message' => trans('page_not_found')], 404);
         }

         return response()->json($categories);

       }
    }

    public function show($id){
        $category = Category::find($id);
        if($category != null){
           return response()->json($category);
        }
         else{
            return response()->json(['message' => trans('category_not_found')],404);
        }
    }


}
