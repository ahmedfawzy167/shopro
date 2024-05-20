<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
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

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $fileName;
        $brand->save();

        Session::flash('message','Brand is Created Successfully');
        return redirect(route('brands.index'))->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $location = "public/";
            $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
            $img->storeAs($location,$fileName);
        }

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->image = $fileName;
        $brand->save();

        Session::flash('message','Brand is Updated Successfully!');
        return redirect(route('brands.index'))->withInput();

    }

    /**
     * Trash the specified resource in storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Session::flash('message','Brand is Trashed Successfully');
        return redirect(route('brands.index'))->withInput();

    }

    public function trashed()
    {
       $trashedBrands = Brand::onlyTrashed()->get();
       return view('brands.trashed',compact('trashedBrands'));
    }
    public function restore($id)
  {
    $brand = Brand::withTrashed()->findOrFail($id);
    $brand->restore();

    Session::flash('message','Brand is Restored Successfully');
    return redirect(route('brands.index'))->withInput();
  }

   public function delete($id)
  {
    $brand = Brand::withTrashed()->findOrFail($id);
    $brand->forceDelete();

    Session::flash('message','Brand is Permanently Deleted Successfully');
    return redirect(route('brands.index'))->withInput();
  }




}
