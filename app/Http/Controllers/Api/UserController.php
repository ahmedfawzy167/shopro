<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\UserDetailsResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        if($users)
        {
           if(request('page') > $users->lastPage()){
            return response()->json(['message' => trans('page_not_found')],404);
        }
            return new UserResource($users);
        }

    }

   public function show($id)
   {
     $user = User::find($id);
      if($user != null){
        return new UserDetailsResource($user);
      }
      else{
        return response()->json(['message'=> trans('user_not_found')]);
      }
   }


}
