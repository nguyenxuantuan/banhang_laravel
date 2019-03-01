<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Cart;
// use Symfony\Component\HttpFoundation\Session\Session;
use Session;

class AppServiceProvider extends ServiceProvider
{

  public function boot()
  {
    Schema::defaultStringLength(191);
    view()->composer('layout/header',function( $view){
      $loai_sp= ProductType::all();
      $view->with('loai_sp',$loai_sp);
    });

    // view()->composer('layout/header',function($view){
    //   if(Session('cart')){
    //     $oldcart = Session::get('cart');
    //     $cart = new Cart($oldcart);
    //     $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    //   }
    // });
  }
  public function register()
  {
  }
}
