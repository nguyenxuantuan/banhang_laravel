<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DanhmuckhachhangController extends Controller
{
  public function index(){
    $khachhang = User::get();
    return view('admin.danhmuckhachhang.index',compact('khachhang'));
  }

  public function delete($id){
    $khachhang = User::find($id);
    $khachhang->delete($id);
    return redirect()->back();
  }

  public function create(){
     $khachhang = User::get();
    return view('admin.danhmuckhachhang.create',compact('khachhang'));
  }

  public function insert(Request $request){
    $this->validate($request,[
      'name'=>'required',
      'email'=>'required|email|min:6|max:20',
      'password'=>'required|min:6',
      'password_confirm'=>'required|same:password',
    ],[
      'name.required'=>'ten khong duoc bo trong',
      'email.required'=>'email khong duoc bo trong',
      'email.email'=>'email khong dung dinh dang',
      'email.min'=>'email khong nho hon 6 ky tu',
      'email.max'=>'email khong lon hon 20 ky tu',
      'password.required'=>'pass khong duoc trong',
      'password.min'=>'pass lon hon 6 ky tu',
      'password_confirm.required'=>'password confirm khong duoc bo trong',
      'password_confirm.same'=>'password confirm khac pass'
    ]);
    $khachhang = new User;
    $khachhang->name=$request->name;
    $khachhang->email = $request->email;
    $khachhang->password= md5($request->password);
    $khachhang->save();
    return redirect()->route('khachhangs.index');
  }
}
