<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
class JWTmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        }
        catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Invalid token',
                ], Response::HTTP_UNAUTHORIZED);
             } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Token Expired',
                ], Response::HTTP_UNAUTHORIZED);
            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Token Not Found',
                ], Response::HTTP_UNAUTHORIZED);
            }
        }

        return $next($request);
    }
    }

