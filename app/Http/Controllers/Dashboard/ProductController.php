<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if($request->has('term')) {
            $term = $request->term;
            $filter = $request->filter ?? 'name';

            if($filter === 'sub_category_id') {
                $query->whereHas('subCategory', function ($subCategoryQuery) use ($term) {
                $subCategoryQuery->where('name', 'LIKE', "%$term%");
            });
            }
            else{
                $query->where($filter, 'LIKE', "%$term%");
            }
        }

        $products = $query->paginate(20);
        return view('products.index', compact('products'));
    }

    public function create(){
       $subCategories = SubCategory::all();
       return view('products.create',compact('subCategories'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,150',
            'description' => 'required|string|max:800',
            'cost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'gt:0'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'gt:0'],
            'stock' => 'required|numeric|gt:0',
            'sub_category_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        Session::flash('message','Product is Created Successfully');
        return redirect(route('products.create'))->withInput();
    }
    public function show($id)
    {
        $product = Product::with(['subCategory','skus'])->find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $subCategories = SubCategory::all();
        return view('products.edit', compact('product','subCategories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'description' => 'required|string|max:800',
            'cost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'gt:0'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'gt:0'],
            'stock' => 'required|numeric|gt:0',
            'sub_category_id' => 'required|numeric|gt:0',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        Session::flash('message','Product is Updated Successfully');
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('message', 'Product is Trashed Successfully');
        return redirect(route('products.index'));
    }
    public function trashed()
    {
       $trashedProducts = Product::onlyTrashed()->get();
       return view('products.trashed',compact('trashedProducts'));
    }

  public function restore($id)
   {
     $product = Product::withTrashed()->findOrFail($id);
     $product->restore();

    Session::flash('message','Product is Restored Successfully');
    return redirect(route('products.index'))->withInput();
  }

   public function delete($id)
  {
    $product = Product::withTrashed()->findOrFail($id);
    $product->forceDelete();

    Session::flash('message', 'Product is Permanently Deleted Successfully');
    return redirect(route('products.index'))->withInput();
  }
}


