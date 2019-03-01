<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function login(){
        if(Auth::guard('admin')->check()){
        	return redirect(route('admin.home.index'));
        }
        return view('admin.login.index');
    }

    public function post_login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect(route('admin.home.index'));
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }


}
