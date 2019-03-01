<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use App\BillDetail;
use App\Customer;
use DB;
use App\Product;

class DonhangController extends Controller
{
  public function index(){
    $donhang = Bill::paginate(8);
    $khachhang = Customer::get();
    return view('admin.donhang.index',compact('donhang','khachhang'));
  }

  public function delete($id){
    $donhang = Bill::find($id);
    $donhang->delete($id);
    return redirect()->back();
  }

  public function chitiet($id){
    $id_donhang = Bill::find($id);
    $khachhang =Customer::where('id',$id_donhang->id_customer)->first();
    $id_dh=$id_donhang->id;
    // dd($khachhang);
    $chitietdonhang =BillDetail::where('id_bill', '=', $id_dh)->get();
    // if( $chitietdonhang!=null)
    //   $sanpham = Product::where('id',$chitietdonhang->id_product)->first();
    return view('admin.donhang.chitiet',compact('id_donhang','khachhang','chitietdonhang'));
  }
}
