<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->API_PASSWORD !== env('API_PASSWORD','CXo2KzTvU2rPG8IKD')){
            return response()->json(['message' => 'Unauthenticated.']);
        }

        return $next($request);
    }
}