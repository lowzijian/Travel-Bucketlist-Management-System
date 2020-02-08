<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class adminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->admin == 1){
                return $next($request);
            }else{
                return redirect('/')->withErrors(['errors' => 'Not authorized']);
            }
        }

        return redirect('/')->withErrors(['errors' => 'Not logged in']);
    }
}
