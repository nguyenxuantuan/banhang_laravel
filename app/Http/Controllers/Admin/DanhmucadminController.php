<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Session;
use function GuzzleHttp\Psr7\hash;

class DanhmucadminController extends Controller
{
  public function index(){
    $admin = Admin::get();
    return view('admin.danhmucadmin.index',compact('admin'));
  }

  public function delete($id){
    $admin = Admin::find($id);
    $admin->delete($id);
    return redirect()->back();
  }

  public function create(){
    $admin = Admin::get();
    return view('admin.danhmucadmin.create',compact('admin'));
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
      'password_confirm.required'=> 'password confirm khong duoc bo trong',
      'password_confirm.same'=> 'password confirm khac pass'
    ]);
    $admin = new Admin;
    $admin->name=$request->name;
    $admin->email = $request->email;
    $admin->password= md5($request->password);
    $admin->save();
    return redirect()->route('admins.index');
  }
}
