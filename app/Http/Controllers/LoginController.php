<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email','=', $request->get('email'))->first();
        if($user){
            if($user->verified == 1){
                if (Auth::attempt($credentials)) {
                    if($user->admin){
                        return redirect('/admin');
                    }else{
                        return redirect('/home');
                    }
                }else{
                    throw ValidationException::withMessages(['errors' => 'Invalid login']);
                }
            }else if($user->verified == 2){
                throw ValidationException::withMessages(['errors' => 'Account is banned']);
            }else{
                throw ValidationException::withMessages(['errors' => 'User is not verifed']);
            }
        }else{
            throw ValidationException::withMessages(['errors' => 'User not exist']);
        }
    }
}