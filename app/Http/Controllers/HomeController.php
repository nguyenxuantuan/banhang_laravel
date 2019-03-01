<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use Session;
use Cart;
use App\Customer;
use App\Bill;
use PhpParser\Node\Stmt\Use_;
use App\User;
use Hash;
use function GuzzleHttp\Psr7\hash;
use Auth;
use App\BillDetail;
use DB;

class HomeController extends Controller
{
    public function index(){
      $slide=Slide::all();
      $new_product =Product::where('new',1)->paginate(4);
      $promotion_products=Product::where('promotion_price','<>',0)-> paginate(4);
      $all_product=Product::paginate(12);
      return view('page.trangchu',compact('slide', 'new_product', 'promotion_products', 'all_product'));
    }

    public function loaisp(Request $request){
      $id = $request->id;
      if($id != null){
      $sp_theoloai = Product::where('id_type',$id)->get();
      $sp_khac = Product::where('id_type','<>',$id)->paginate(3);
      return view('page.loaisanpham',compact('sp_theoloai','sp_khac'));
      }else{
        return redirect()->route('home.index');
      }
      // dump($sp_theoloai);
    }

    public function chitietsp(Request $request){
      $sanpham=Product::where('id',$request->id)->first();
      $sp_tuongtu=Product::where('id_type',$sanpham->id_type)->paginate(6);
      return view('page.chitietsp',compact('sanpham','sp_tuongtu'));
    }

    public function lienhe(){
      return view('page.lienhe');
    }

    public function gioithieu(){
      return view('page.gioithieu');
    }

    public function addtocart(Request $request,$id){
      $product=Product::find($id);
      $product_id = $id;
      $price = 0;
      if($product->promotion_price != 0)$price = $product->promotion_price; else $price = $product->unit_price;
      Cart::add([
        'id' => $id,
        'price' => $price,
        'name' => $product->name,
        'qty' => 1,
        'options' => [
          'image' => $product->image
        ]
      ]);
      return redirect()->back();
    }

    public function delete_one_cart($rowId){
      Cart::remove($rowId);
      return redirect()->back();
    }

  public function deletecart(){
    Cart::destroy();
    return redirect()->back();
    }

  public function dathang(){
    return view('page.dathang');
  }

  public function xacnhandathang(Request $request){
    // dump(Cart::content());die;
    // dump($request->all());
    $customer = new Customer();
    $customer->name=$request->name;
    $customer->gender=$request->gender;
    $customer->email=$request->email;
    $customer->address=$request->adress;
    $customer->phone_number=$request->phone;
    $customer->note=$request->note;
    $customer->save();
    // dump(Cart::total());
    $bill = new Bill();
    $bill->id_customer=$customer->id;
    $bill->date_order=date('Y-m-d');
    $bill->total=(int)Cart::total();
    $bill->payment=$request->payment;
    $bill->note=$request->note;
    $bill->save();
    $cart= Cart::content();
    foreach($cart as $key => $value){
      $id_bill = $bill->id;
      $id_product = $value->id;
      $quantity = $value->qty;
      $unit_price = (int)($value->price);
      $created_at = $updated_at = now();
      DB::table('bill_detail')->insert(
        ['id_bill' => $id_bill,'id_product' => $id_product,'quantity' => $quantity, 'unit_price' => $unit_price, 'created_at' => now(), 'updated_at' => now()]
      );

    }
    Cart::destroy();
    return redirect()->back();
  }

  public function login(){
    return view('page.login');
  }

  public function dangnhap(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required|min:6|max:20',
        ],[
      'email.required' => 'Vui long nhap email',
      'email.email' => 'khong dung dinh dang',
      'password.required' => 'vui long nhap mat khau',
      'password.min' => 'mat khau it nhat 6 ky tu',
      'password.max' => 'mat khau khong qua 20 ky tu',
      ]);
      $credential=array('email'=>$request->email,'password'=>$request->password);
      if(Auth::attempt($credential)){
        return redirect()->route('home.index')->with(['flag'=>'success','thongbao'=>'dang nhap thanh cong']);
        }
      else {
        return redirect()->back()->with(['flag'=>'danger','thongbao'=>'dang nhap that bai !']);
        }
  }

  public function dangxuat(){
    Auth::logout();
    return redirect()->route('home.index');
  }

  public function sigup(){
    return view('page.sigup');
  }

  public function postsigup(Request $request){
    $this->validate( $request,[
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6|max:20',
      'fullname'=>'required',
      'address'=>'required',
      're_password'=>'required|same:password',
      ],[
      'email.required'=>'Vui long nhap email',
      'email.email'=>'khong dung dinh dang',
      'email.unique'=>'email da co nguoi khac su dung',
      'password.required'=>'vui long nhap mat khau',
      'address.required'=>'Vui  long nhap address',
      're_password.same'=>'mat khau khong khop',
      'password.min'=>'mat khau it nhat 6 ky tu'
    ]);
    $user= new User();
    $user->full_name=$request->fullname;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    // $user->re_password=$request->re_password;
    $user->phone=$request->phone;
    $user->address=$request->address;
    $user->save();
    return redirect()->back()->with('thanhcong','tao tai khoan thanh cong');
  }

  public function search(Request $request){
    //tim kiem theo then hoac theo gia
    $product=Product::where('name','like','%'.$request->key.'%')
                      ->orwhere('unit_price',$request->key)->get();
    return view('page.search',compact('product'));
  }
}
