<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $customers = Customer::where('city_id',5)->count();
       $categories = Category::count();
       $subcategories = SubCategory::count();

       $totalProducts = Product::count();
       $products = Product::all();
       $totalRevenue = 0;

foreach($products as $product) {
    $quantitySold = $totalProducts - $product->stock;
    $revenue = $product->price * $quantitySold;
    $totalRevenue += $revenue;
}

  $today = Carbon::today();
  $productsToday = Product::with('skus')->whereDate('created_at',$today)->get();


  $orders = Order::count();

  return view('home',compact('customers','categories','subcategories','totalRevenue','productsToday','orders'));
}

public function search(Request $request)
{
    $term = $request->input('term');

    $routeExists = Route::has($term);

    if($routeExists)
    {
        return redirect()->route($term);
    }
    else{
        abort(Response::HTTP_NOT_FOUND);
    }

}


}
