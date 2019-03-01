<?php

use Illuminate\Support\Facades\Route;
 //frontend
  Route::get('','HomeController@index')->name('home.index');
  Route::get('/loaisanpham/{id?}','HomeController@loaisp')->name('home.loaisp');
  Route::get('/chitietsp/{id?}','HomeController@chitietsp')->name('home.chitietsp');
  Route::get('/lienhe','HomeController@lienhe')->name('home.lienhe');
  Route::get('/gioithieu','HomeController@gioithieu')->name('home.gioithieu');
  Route::get('add-to-cart/{id?}','HomeController@addtocart')->name('home.addtocart');
  Route::get('delete-one-cart/{rowId?}','HomeController@delete_one_cart')->name('home.delete_one_cart');
  Route::post( 'delete_onecart_ajax', 'HomeController@delete_onecart_ajax')->name( 'delete_onecart_ajax');
  Route::get('deletecart','HomeController@deletecart')->name('home.deletecart');
  Route::post('deletecart_ajax','HomeController@deletecart_ajax')->name('deltecart_ajax');
  Route::get('dathang','HomeController@dathang')->name('home.dathang');
  Route::post('xacnhandathang','HomeController@xacnhandathang')->name('home.xacnhandathang');
  Route::get('login','HomeController@login')->name('home.login');
  Route::post('dangnhap','HomeController@dangnhap')->name('home.dangnhap');
  Route::get('dangxuat','HomeController@dangxuat')->name('home.dangxuat');
  Route::get('sigup', 'HomeController@sigup')->name('home.sigup');
  Route::post('sigin','HomeController@postsigup')->name('home.postsigup');
  Route::get('search','HomeController@search')->name('home.search');

//end frondend


//backend
  Route::get('admin','Admin\LoginController@login')->name('admin.login');
  Route::get('admin/logout','Admin\LoginController@logout')->name('admin.logout');
  Route::post('admin/login','Admin\LoginController@post_login')->name('admin.post_login');
  Route::middleware(['admin'])->group(function () {
    Route::prefix('')->group(function () {

      // trang index sau khi login
      Route::get('admins', 'Admin\HomeController@index')->name('admin.home.index');

      // bắt đầu danh mục admin
        Route::get('/index','Admin\DanhmucadminController@index')->name('admins.index');
        Route::post('admins/delete/{id}','Admin\DanhmucadminController@delete')->name('admins.delete');
        Route::get('admins/create','Admin\DanhmucadminController@create')->name('admins.create');
        Route::post('admins/create','Admin\DanhmucadminController@insert')->name('admins.insert');
        // Route::get('admins/edit/{id?}','Admin\DanhmucaddminController@edit')->name('admins.edit');
        // Route::post('admins/update/{id}','Admin\DanhmucaddminController@update')->name('admins.update');
      // kết thúc danh mục admin

      // ------------------------------

      // bắt đầu loại sản phẩm
        Route::get('loaisanphams','Admin\LoaisanphamController@index')->name('loaisanphams.index');
        Route::get('loaisanphams/create','Admin\LoaisanphamController@create')->name('loaisanphams.create');
        Route::post('loaisanphams/create','Admin\LoaisanphamController@store')->name('loaisanphams.store');
        Route::post('loaisanphams/delete/{id}','Admin\LoaisanphamController@delete')->name('loaisanphams.delete');
        Route::get('loaisanphams/edit/{id?}','Admin\LoaisanphamController@edit')->name('loaisanphams.edit');
        Route::post('loaisanphams/update/{id}','Admin\LoaisanphamController@update')->name('loaisanphams.update');
        Route::post('timkiemloaisanpham','Admin\LoaisanphamController@timkiem')->name('loaisanphams.timkiem');
      // kết thúc loại sản phẩm

      // ------------------------------

      // bắt đầu tất cả các sản phẩm
        Route::get('sanphams','Admin\TatcasanphamController@index')->name('sanphams.index');
        Route::get('sanphams/create','Admin\TatcasanphamController@create')->name('sanphams.create');
        Route::post('sanphams/create','Admin\TatcasanphamController@store')->name('sanphams.store');
        Route::post('sanphams/delete/{id}','Admin\TatcasanphamController@delete')->name('sanphams.delete');
        Route::get('sanphams/edit/{id?}','Admin\TatcasanphamController@edit')->name('sanphams.edit');
        Route::post('sanphams/update/{id}','Admin\TatcasanphamController@update')->name('sanphams.update');
        Route::post('timkiemsanpham','Admin\TatcasanphamController@timkiem')->name('sanphams.timkiem');
        Route::post('delete_ajax', 'Admin\TatcasanphamController@delete_ajax')->name('delete_ajax');
      //kết thúc tất cả các sản phẩm

      // ------------------------------

      //Bắt đầu đơn hàng
        Route::get('donhangs','Admin\DonhangController@index')->name('donhangs.index');
        Route::post('donhangs/delete/{id}','Admin\DonhangController@delete')->name('donhangs.delete');
        Route::get('chitietdonhangs/{id}','Admin\DonhangController@chitiet')->name('donhangs.chitiet');
      //kết thúc đơn hàng

      //--------------------------------------

      // bắt đầu danh mục tài khoản khách hàng
        Route::get('khachhangs','Admin\DanhmuckhachhangController@index')->name('khachhangs.index');
        Route::post('khachhangs/delete/{id}','Admin\DanhmuckhachhangController@delete')->name('khachhangs.delete');
        Route::get('khachhangs/create','Admin\DanhmuckhachhangController@create')->name('khachhangs.create');
        Route::post('khachhangs/create','Admin\DanhmuckhachhangController@insert')->name('khachhangs.insert');
        // Route::get('khachhangs/edit/{id?}','Admin\DDanhmuckhachhangController@edit')->name('khachhangs.edit');
        // Route::post('khachhangs/update/{id}','Admin\DDanhmuckhachhangController@update')->name('khachhangs.update');
      // kết thúc danh mục khach hang

      //--------------------------------------

      // bắt đầu danh mục chi tiết khách hàng
        Route::get('chitietkhs','Admin\ChitietkhController@index')->name('chitietkhs.index');
        Route::get('chitietkhs/create','Admin\ChitietkhController@create')->name('chitietkhs.create');
        Route::post('chithietkhs/create','Admin\ChitietkhController@insert')->name('chitietkhs.insert');
        Route::post('chitietkhs/delete/{id}','Admin\ChitietkhController@delete')->name('chitietkhs.delete');
      // kết thúc danh mục khach hang
    });
});
//end backend
