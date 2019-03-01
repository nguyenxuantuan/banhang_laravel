<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductType;
use App\Product;
use Storage;
use DB;
use Illuminate\Support\Facades\Input;

class LoaisanphamController extends Controller
{
  public function create(){
    return view('admin.loaisanpham.create');
  }

  public function edit($id){
    $loaisp=ProductType::find($id);
    return view('admin.loaisanpham.update',compact('loaisp'));
  }

  public function update(Request $request,$id){
    if($request->hasFile('anh')){
       $anh = $request->file('anh');
      $tenanh= $anh->getClientOriginalName('anh');
      $path = $anh->storeAs('uploads',$tenanh);
    }
    else $tenanh =null;
    $full_path = isset($path)?Storage::disk('public')->url($path):"";
     $tenlsp = $request->tenlsp;
    $mota = $request->mota;
    DB::table('type_products')
      ->where('id',$id)
      ->update([
        'name' => $tenlsp,
        'description'=>$mota ,
        'image'=>$tenanh
        ]);
    return redirect()->route('loaisanphams.index');
  }

  public function delete($id){
    $loaisp = ProductType::find($id);
    DB::table('products')->where('id_type', '=',$loaisp)->delete();
    $loaisp->delete($id);
    return redirect()->back();
  }

  public function index(){
    $loaisanpham = ProductType::paginate(6);
    return view('admin.loaisanpham.index',compact('loaisanpham'));
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'tenlsp'=>'required',
      'anh'=> 'required'
    ],[
      'tenlsp.required'=>'ten loai san pham khong duoc bo trong',
      'anh.required'=>'anh khong duoc de trong'
    ]);
    if($request->hasFile('anh')){
       $anh = $request->file('anh');
      $tenanh= $anh->getClientOriginalName('anh');
      $path = $anh->storeAs('uploads',$tenanh);
    }
    $full_path = isset($path)?Storage::disk('public')->url($path):"";

    $tenlsp = $request->tenlsp;
    $mota = $request->mota;

    $loaisp = new ProductType();
    $loaisp->name=$tenlsp;
    $loaisp->description=$mota;
    $loaisp->image=$tenanh;
    $loaisp->save();
    return redirect()->route('loaisanphams.index');
  }

  public function timkiem(Request $request){
    $loaisanpham = ProductType::where('name','like','%'.$request->key.'%')->get();
    return view('admin.loaisanpham.search',compact('loaisanpham'));
  }
}
