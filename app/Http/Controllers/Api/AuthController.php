<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => ['required', Password::defaults()],
            'type_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_id' =>  $request->type_id,
        ]);

        return response()->json([
            'status' => 200,
            'message' => trans('registered'),
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This Email Doesn\'t Match Our Records'
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Incorrect Password'
            ], 404);
        }

        if ($user->status === 'pending') {
            return response()->json(['message' => 'You Can\'t Login Now, Please Contact The Administrator'], 403);
        }

        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);

        return response()->json([
            "status" => 200,
            "message" => trans('login'),
            "user" => $user,
            "Access_token" => $token,
            "type" => "bearer",
            "expires_in" => JWTAuth::factory()->getTTL() * 60,
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

        if (!$token) {
            return response()->json([
                'message' => 'Token Not Found'
            ], 401);
        }

        try {
            $new_token = JWTAuth::parseToken()->refresh($token);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'message' => 'Invalid Token'
            ], 401);
        }

        if ($new_token) {
            return response()->json([
                'Status' => 200,
                'New Access_token' => $new_token
            ]);
        } else {
            return response()->json([
                'message' => 'Error'
            ], 404);
        }
    }
}
