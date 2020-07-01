<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";

    public function detail(){
        return $this->hasMany('App\BillDetail','bill_id','id');
    }
    
}
