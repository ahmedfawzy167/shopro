<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
   public function index()
   {
     $orders = Order::all();
     return view('orders.index',compact('orders'));
   }

   public function reject($id)
   {
     $order= Order::findOrFail($id);
     $order->delete();
     Session::flash('message','Order Rejected!');
     return redirect()->route('orders.index');
   }

}
