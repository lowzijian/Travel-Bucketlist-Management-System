<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $verifiedUser = User::where('verified', '=', 1)->where('admin', '=', 0)->get();
        $notVerifiedUser = User::where('verified', '=', 0)->where('admin', '=', 0)->get();
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

    public function updateUser(Request $request, $id)
    {
        $this->authorize('updateUser', User::class);
        if($request->get('type') === 'Accept'){
            User::where('id', '=', $id)->update(['verified' => 1]);
        }else if($request->get('type') === 'Reject'){
            User::where('id', '=', $id)->update(['verified' => 2]);
        }else if($request->get('type') === 'Revoke'){
            User::where('id', '=', $id)->update(['verified' => 0]);
        } 
        return redirect('/admin');
    }
}
