<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class checkAuth
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
            if($user->verified){
                return $next($request);
            }else{
                return redirect('/')->withErrors(['errors' => 'Account is not verified']);
            }
        }

        return redirect('/')->withErrors(['errors' => 'Not logged in']);

        
        
    }
}
