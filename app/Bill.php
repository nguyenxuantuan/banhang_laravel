<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function billdetail(){
        return $this->hasMany('App\Bill','id_bill','id');
    }


    public function customer(){
         return $this->hasMany('App\Customer','id_customer','id') ;
    }
}
