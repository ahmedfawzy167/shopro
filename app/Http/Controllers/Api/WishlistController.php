<?php

namespace App\Http\Controllers\Api;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists =  Wishlist::all();
        return response()->json($wishlists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|gt:0',
            'sku_id' => 'required|numeric|gt:0',
        ]);

        $wishlist = new Wishlist();
        $wishlist->user_id = $request->user_id;
        $wishlist->sku_id = $request->sku_id;
        $wishlist->save();

        return response()->json([
            'Status' => 'Success',
            'message'=> 'Wishlist Added Successfully',
            'wishlist' => $wishlist,
        ]);
    }

    public function show($id){
        $wishlist = Wishlist::find($id);
        if($wishlist != null){
           return response()->json($wishlist);
        }
        else{
            return response()->json('Wishlist Not Found',404);
        }
    }

    public function destroy($id)
    {
         $wishlist = Wishlist::find($id);
         $wishlist -> delete();
         return response()->json([
             'Status'=>'Success',
             'message'=>'Wishlist Deleted Successfully',
           ]);
    }

}

