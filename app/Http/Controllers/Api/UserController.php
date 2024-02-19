<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


public function show($id){
    $user = User::find($id);
    if($user != null){
        return response()->json($user);
    }
    else{
        return response()->json('User Not Found',404);
    }
}


}
