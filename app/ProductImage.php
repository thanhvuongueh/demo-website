<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $table = "product_images";

    protected $fillable = ['image','product_id'];

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
