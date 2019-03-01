<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use Storage;
use DB;

class TatcasanphamController extends Controller
{
  public function index(){
    // dump( Loaisanpham::find(1));die;
   $sanpham = Product::orderby('id',' desc')->paginate(6);
    return view('admin.sanpham.index',compact('sanpham'));
  }

  public function create(){
    $loaisp=ProductType::get();
    return view('admin.sanpham.create',compact('loaisp'));
  }

  public function edit($id){
    $sp=Product::find($id);
    $loaisp=ProductType::get();
    return view('admin.sanpham.update',compact(['sp','loaisp']));
  }

  public function update(Request $request,$id ){
    if($request->hasFile('anh')){
       $anh = $request->file('anh');
      $tenanh= $anh->getClientOriginalName('anh');
      $path = $anh->storeAs('uploads',$tenanh);
      }
    else $tenanh =null;
    $full_path = isset($path)?Storage::disk('public')->url($path):"";
    $tensp = $request->tensp;
    $id_loai=$request->loaisanpham;
    $mota = $request->mota;
    $gia=$request->dongia;
    $giakm=$request->giakm;
    $donvi=$request->donvi;
    $moi=$request->moi;
    DB::table('products')
      ->where('id',$id )
      ->update([
      'name' => $tensp,
      'id_type'=>$id_loai,
      'description'=>$mota,
      'unit_price'=>$gia,
      'promotion_price'=>$giakm,
      'image'=>$tenanh ,
      'unit'=>$donvi,
      'new'=>$moi
      ]);
    return redirect()->route('sanphams.index');
  }

  public function delete($id){
    $sp = Product::find($id);
    $sp->delete($id);
    return redirect()->back();
  }

  public function store(Request $request){
    $this->validate($request,[
      'tensp'=>'required',
      'dongia'=> 'required',
      'anh'=>'required',
      'donvi'=>'required',
      'moi'=>'required'
    ],[
      'tensp.required'=>'ten san pham khong duoc de trong',
      'dongia.required'=>'don gia khong duoc de trong',
      'anh.required'=>'anh khong duoc trong',
      'donvi.required'=>'don vi khong duoc trong',
      'moi.required'=>'truong san pham moi khong duoc de trong'
    ]);
    if($request->hasFile('anh')){
      $anh = $request->file('anh');
      $tenanh= $anh->getClientOriginalName('anh');
      $path = $anh->storeAs('uploads',$tenanh);
      }
    $full_path = isset($path)?Storage::disk('public')->url($path):"";
    $tensp = $request->tensp;
    $id_loai=$request->loaisanpham;
    $mota = $request->mota;
    $gia=$request->dongia;
    $giakm=$request->giakm;
    $donvi=$request->donvi;
    $moi=$request->moi;
    DB::table('products')->insert([
      'name' => $tensp,
      'id_type'=>$id_loai,
      'description'=>$mota,
      'unit_price'=>$gia,
      'promotion_price'=>$giakm,
      'image'=>$tenanh,
      'unit'=>$donvi,
      'new'=>$moi
      ]);
    return redirect()->route('sanphams.index');
  }

  public function timkiem(Request $request){
    $sanpham = Product::where('name','like','%' .$request->key.'%')->get();
    foreach($sanpham as $sp){
      $cate = ProductType::where('id',$sp->id_type)->first();
    }
    return view('admin.sanpham.search',compact('sanpham','cate'));
  }
  public function delete_ajax(Request $request){
    $id_product = $request->id_product;
    Product::find($id_product)->delete();
    return $id_product;
  }

}
