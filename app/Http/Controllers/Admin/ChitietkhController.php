<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class ChitietkhController extends Controller
{
    public function index(){
      $khachhang = Customer::get();
      return view('admin.chitietkh.index',compact('khachhang'));
    }

    public function create(){
      $khachhang = Customer::get();
      return view('admin.chitietkh.create',compact('khachhang'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'gender'=>'required',
        'email'=>'required|email',
        'address'=>'required',
        'phone_number'=>'required'
      ],[
        'name.required'=>'ten khong duoc bo trong',
        'gender.required'=>'gioi tinh khong duoc bo trong',
        'email.required'=>'email khong duoc bo trong',
        'email.email'=>'email khong dung dinh dang',
        'address.required'=>'dia chi khong duoc de trong',
        'phone_number.required'=>'SDT khong duoc bo trong'
      ]);
      $kh = new Customer;
      $kh->name=$request->name;
      $kh->gender=$request->gioitinh;
      $kh->email=$request->email;
      $kh->address=$request->diachi;
      $kh->phone_number=$request->SDT;
      $kh->note=$request->ghichu;
      $kh->save();
      return redirect()->route('chitietkhs.index');
    }

    public function delete($id){
      $kh = Customer::find($id);
      $kh->destroy($id);
      return redirect()->route('chitietkhs.index');
    }
}
