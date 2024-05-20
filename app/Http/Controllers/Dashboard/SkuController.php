<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Sku;
use App\Models\Image;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
      if(request('term') != "") {
         $term = request('term');
         $skus = Sku::where('name','LIKE',"%$term%")->paginate(10);
       }
         else{
            $skus = Sku::paginate(10);
        }
          return view('skus.index',compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $products = Product::all();
       return view('skus.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,150',
            'product_id' => 'required|numeric|gt:0',
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:3000',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sku = new Sku();
        $sku->name = $request->name;
        $sku->product_id = $request->product_id;
        $sku->save();

        foreach($request->file('images') as $imageFile) {
            $ext = $imageFile->getClientOriginalExtension();
            $fileName = Date("Y-m-d-h-i-s") . '.' . $ext;
            $location = "public/";
            $imageFile->storeAs($location,$fileName);

            $image = new Image();
            $image->path = $fileName;
            $image->imageable_id = $sku->id;
            $image->imageable_type = 'App\Models\Sku';
            $image->save();
        }

        Session::flash('message','Sku Created Successfully');
        return redirect(route('skus.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sku = Sku::with(['product','images'])->findOrFail($id);
        return view('skus.show',compact('sku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $sku = Sku::findOrFail($id);
       $products = Product::all();
       return view('skus.edit',compact('sku','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
      $validator = Validator::make($request->all(),[
        'name' => 'required|string|between:2,150',
        'product_id' => 'required|numeric|gt:0',
        'images' => 'required|array|max:5',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:3000'
    ]);

    if($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $sku = Sku::findOrFail($id);
    $sku->name = $request->name;
    $sku->product_id = $request->product_id;
    $sku->save();

    if($request->hasFile('images')) {
        foreach($request->file('images') as $imageFile) {
            $ext = $imageFile->getClientOriginalExtension();
            $fileName = Date("Y-m-d-h-i-s") . '.' . $ext;
            $location = "public/";
            $imageFile->storeAs($location,$fileName);

            $image = new Image();
            $image->path = $fileName;
            $image->imageable_id = $sku->id;
            $image->imageable_type = 'App\Models\Sku';
            $image->save();
        }
     }

      Session::flash('message','Sku Updated Successfully');
      return redirect(route('skus.index'));
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sku = Sku::findOrFail($id);
        $sku->delete();
        Session::flash('message','Sku Trashed Successfully');
        return redirect(route('skus.index'));
    }

    public function trashed()
    {
       $trashedSkus = Sku::onlyTrashed()->get();
       return view('skus.trashed',compact('trashedSkus'));
    }

  public function restore($id)
  {
    $sku = Sku::withTrashed()->findOrFail($id);
    $sku->restore();

    Session::flash('message','Sku Restored Successfully');
    return redirect(route('skus.index'));
  }

   public function delete($id)
  {
    $sku = Sku::withTrashed()->findOrFail($id);
    $sku->forceDelete();

    Session::flash('message','Sku Permanently Deleted Successfully');
    return redirect(route('skus.index'));
  }

}
