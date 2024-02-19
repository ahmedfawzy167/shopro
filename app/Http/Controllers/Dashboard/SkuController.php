<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Sku;
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
        $skus = Sku::paginate(10);
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
            'image'   => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $location = "public/";
        $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
        $img->storeAs($location,$fileName);

        $sku = new Sku();
        $sku->name = $request->name;
        $sku->product_id = $request->product_id;
        $sku->image = $fileName;
        $sku->save();

        Session::flash('message', 'Sku is Created Successfully');
        return redirect(route('skus.create'))->withInput();
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sku = Sku::with('product')->find($id);
        return view('skus.show',compact('sku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $sku = Sku::find($id);
       $products = Product::all();
       return view('skus.edit',compact('sku','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,150',
            'product_id' => 'required|numeric|gt:0',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sku =  Sku::find($id);
        $sku->name = $request->name;
        $sku->product_id = $request->product_id;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $location = "public/";
            $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
            $img->storeAs($location,$fileName);
            $sku->image = $fileName;
        }
           $sku->save();

         Session::flash('message', 'Sku Updated Successfully');
         return redirect(route('skus.index'))->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sku = Sku::find($id);
        $sku->delete();
        Session::flash('message', 'Sku Deleted Successfully');
        return redirect(route('skus.index'))->withInput();
    }
}
