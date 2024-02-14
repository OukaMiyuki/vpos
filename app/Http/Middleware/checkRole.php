<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$type){

    //     $user = $request->user();

    //     if (! $user || ! in_array($user->type, $type)) {
    //         abort(403, 'Unauthorized');
    //     }

    //     return $next($request);

    // }
    public function handle(Request $request, Closure $next, $userType): Response {
        if(auth()->user()->type == $userType){
            return $next($request);
        }
          
        return response()->json(['You do not have permission to access for this page.']);
    }
}
