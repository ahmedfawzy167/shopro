<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => 'required|string|min:10',
            'type_id' => 'required|numeric|gt:0',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type_id' =>  $request->input('type_id'),
        ]);

        $credentials = $request->only('email','password');
        $token = JWTAuth::attempt($credentials);
        return response()->json([
            'status' => 200,
            'message' => trans('registered'),
            'user' => $user,
            'Authorization' =>[
               'token' => $token,
            ]
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:10',
            'remember_token' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

         $user = User::where('email',$request->email)->first();

         if(!$user){
           return response()->json(['message' => 'This Email Doesn\'t Match Our Records']);
         }

        if(!Hash::check($request->password,$user->password)) {
         return response()->json(['message' => 'Incorrect Password']);
       }

        $credentials = $request->only('email','password');
        $token = JWTAuth::attempt($credentials);

       if($request->has('remember_token')){
          $user->remember_token = $request->remember_token;
          $user->save();
        }

    return response()->json([
        'status' => 200,
        'message' => trans('login'),
        'user' => $user,
        'Authorization' => [
        'token' => $token,
        'remember_token' => $user->remember_token,
      ]
    ]);
}
    public function logout(Request $request)
    {
        try {
            JWTAuth::parseToken()->invalidate($request->token);
        } catch (JWTException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => trans('logout'),
        ]);
    }

    public function refreshToken(Request $request)
    {
        $token = $request->bearerToken();

        if(!$token) {
            return response()->json(['message' => 'Token Not Found'],401);
        }

        try {
            $new_token = JWTAuth::parseToken()->refresh($token);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'Invalid Token'],401);
        }

       if($new_token) {
          return response()->json(['token' => $new_token]);
       }

       else{
         return response()->json(['message' => 'Error'],404);
       }

    }

}
