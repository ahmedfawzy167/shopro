<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index()
   {
     $orders = Order::all();
     return view('orders.index',compact('orders'));
   }

}
