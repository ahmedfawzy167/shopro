<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\OrderDetailsResource;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|gt:0',
            'sku_id' => 'required|numeric|gt:0',
            'date' => 'required|date|after:today',
            'total' => 'required|numeric|gt:0',
        ]);

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->sku_id = $request->sku_id;
        $order->date = $request->date;
        $order->total = $request->total;
        $order->save();

        return response()->json([
            'Status' => 'Success',
            'message'=> 'Order Placed Successfully',
            'order' => $order,
        ]);
    }

    public function show($id){
        $order = Order::find($id);
        if($order != null){
           return new OrderDetailsResource($order);
        }
        else{
            return response()->json(['message' =>trans('order_not_found')],404);
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'user_id' => 'required|numeric|gt:0',
            'date' => 'required|date|after:today',
            'total' => 'required|numeric|gt:0',
        ]);

        $order = Order::find($id);
        $order->user_id = $request->user_id;
        $order->date = $request->date;
        $order->total = $request->total;
        $order->save();

        return response()->json([
            'status' => 'success',
            'message'=> 'Order Updated Successfully',
            'order' => $order ,
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if($order!=null){
            $order -> delete();
            return response() -> json(['Status'=>'Sucess','message'=>'Order Deleted Successfully']);
        }
    }

}
