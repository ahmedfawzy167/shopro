<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\CartDetailsResource;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|gt:0',
            'sku_id' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
        ]);

        $cart = new Cart();
        $cart->user_id = $request->user_id;
        $cart->sku_id = $request->sku_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([
            'Status' => 'Success',
            'message'  => "Added to Cart Successfully",
            'cart' => $cart,
        ],200);
    }

    public function show($id){
        $cart = Cart::find($id);
        if($cart != null){
           return new CartDetailsResource($cart);
        }
        else{
            return response()->json(['message' => trans('cart_not_found')],404);
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'user_id' => 'required|numeric|gt:0',
            'sku_id' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
        ]);

        $cart = Cart::find($id);
        $cart->user_id = $request->user_id;
        $cart->sku_id = $request->sku_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Cart is Updated Successfully',
            'cart' => $cart,
        ],200);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        if($cart!=null){
            $cart -> delete();
            return response() -> json([
              'Status'=>'Success',
              'message'=>'Delete is Done'
            ],200);
        }
    }
}
