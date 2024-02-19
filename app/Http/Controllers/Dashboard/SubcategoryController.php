<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class SubCategoryController extends Controller
{
   public function index()
   {
    if (request('term') != "") {
    $term = request('term');
    $subcategories = SubCategory::where("name","LIKE","%$term%")->paginate(15);
    }
    else{
      $subcategories = SubCategory::paginate(15);
    }
     return view('subcategories.index',compact('subcategories'));
   }

   public function create()
   {
      $categories = Category::all();
      return view('subcategories.create',compact('categories'));
   }

   public function store(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required|string|between:2,100',
           'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
           'category_id' => 'required|numeric|gt:0',
       ]);

       if($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }

       //////file Upload///////

        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $location = "public/";
        $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
        $img->storeAs($location,$fileName);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->image = $fileName;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

       Session::flash('message','Subcategory is Created Successfully');
       return redirect(route('subcategories.create'))->withInput();
   }

   public function show($id)
   {
       $subcategory = SubCategory::with('products')->find($id);
       return view('subcategories.show', compact('subcategory'));
   }

   public function edit($id)
   {
       $subcategory = SubCategory::find($id);
       $categories = Category::all();
       return view('subcategories.edit', compact('subcategory','categories'));
   }

   public function update(Request $request, $id)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required|string|between:2,100',
           'image'   => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
       ]);

       if($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }

       $subcategory = SubCategory::find($id);
       $subcategory->name = $request->name;

       if($request->hasFile('image')){
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $location = "public/";
        $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
        $img->storeAs($location,$fileName);
        $subcategory->image = $fileName;
    }
       $subcategory->save();

       Session::flash('message','Subcategory is Updated Successfully');
       return redirect(route('subcategories.index'))->withInput();
   }

   public function destroy($id)
   {
       $subcategory = SubCategory::findOrFail($id);
       $subcategory->delete();
       Session::flash('message','Subcategory is Trashed Successfully');
       return redirect(route('subcategories.index'))->withInput();
   }

   public function trashed()
    {
       $trashedSubcategories = SubCategory::onlyTrashed()->get();
       return view('subcategories.trashed',compact('trashedSubcategories'));
    }

  public function restore($id)
  {
    $subcategory = SubCategory::withTrashed()->findOrFail($id);
    $subcategory->restore();

    Session::flash('message','Subcategory is Restored Successfully');
    return redirect(route('subcategories.index'))->withInput();
  }

   public function delete($id)
  {
    $subcategory = SubCategory::withTrashed()->findOrFail($id);
    $subcategory->forceDelete();

    Session::flash('message', 'Subcategory is Permanently Deleted Successfully');
    return redirect(route('subcategories.index'))->withInput();
  }

}
