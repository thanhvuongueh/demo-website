<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = "cates";

    protected $fillable = ['name','alias','order','parent_id','keywords'];

    public function product(){
        return $this->hasMany('App\Product','cate_id','id');
    }

    public function parentCate(){
        return $this->belongsTo('App\Cate','parent_id','id');
    }

    public function childCate(){
        return $this->hasMany('App\Cate','parent_id','id');
    }
}
