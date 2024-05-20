<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Sku;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class HomeController extends Controller
{
    public function index()
    {
        //fetch all customer that lives in cairo//
        $customers = Customer::where('city_id', 5)->count();

        //Count the number of categories//
        $categories = Category::count();

        //Count the number of Subcategories//
        $subcategories = Subcategory::count();

        //Getting All Products Added Today//
        // $today = Carbon::today();
        $productMonth = Product::with('skus')->whereMonth('created_at', 12)->get();

        //Getting Average of Product price//
        $products = Product::pluck('price');
        $avgPrice = $products->avg();

        $orders = Order::count();

        //fetching All Pending Accounts//
        $userPending = User::where('status', 'pending')->count();

        return view('home', compact('customers', 'categories', 'subcategories', 'avgPrice', 'productMonth', 'orders', 'userPending'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(Product::class, 'name')
            ->registerModel(Category::class, 'name')
            ->registerModel(Subcategory::class, 'name')
            ->registerModel(Sku::class, 'name')
            ->search($query);

        return view('search', compact('searchResults'));
    }
}
