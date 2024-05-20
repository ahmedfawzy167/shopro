<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    public function index()
    {
       $categories = Category::paginate(2);
       return view('categories.index',compact('categories'));
    }

    public function create()
    {
       return view('categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        Session::flash('message','Category is Created Successfully');
        return redirect(route('categories.index'))->withInput();
    }

    public function show($id)
    {
        $category = Category::with('subcategories')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('message','Category is Updated Successfully!');
        return redirect(route('categories.index'))->withInput();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('message','Category is Trashed Successfully');
        return redirect(route('categories.index'))->withInput();
    }
    public function trashed()
    {
       $trashedCategories = Category::onlyTrashed()->get();
       return view('categories.trashed',compact('trashedCategories'));
    }

  public function restore($id)
  {
    $category = Category::withTrashed()->findOrFail($id);
    $category->restore();

    Session::flash('message','Category is Restored Successfully');
    return redirect(route('categories.index'))->withInput();
  }

   public function delete($id)
  {
     $category = Category::withTrashed()->findOrFail($id);
     $category->forceDelete();

     Session::flash('message','Category is Permanently Deleted Successfully');
     return redirect(route('categories.index'))->withInput();
  }


}
