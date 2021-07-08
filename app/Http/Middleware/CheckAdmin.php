<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user         = JWTAuth::parseToken()->authenticate();
        if($user->type_id != 1){
            return response()->json([
                'message' => 'You ARE not an Admin!!!'
            ], 401);
        }

        return $next($request);
    }
}
