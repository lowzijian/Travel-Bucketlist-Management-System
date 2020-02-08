<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $verifiedUser = User::where('verified', '=', 1)->get();
        $notVerifiedUser = User::where('verified', '=', 0)->get();
        return view('Admin.index')->with([
            'verified' => $verifiedUser,
            'notVerified' => $notVerifiedUser
        ]);
    }

    public function hey()
    {
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('Register.index');
        }
    }
}
