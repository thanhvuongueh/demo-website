<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Product;

class AjaxController extends Controller
{
    //
    public function getProductFromCate($cateId){
        $cate = Cate::find($cateId);
        $allCateId = getIdChildCate($cateId);
        array_unshift($allCateId,$cateId);
        echo "<select class='form-control sltName' name='sltName[]'>";
        foreach($allCateId as $id){
            $cate = Cate::find($id);
            foreach($cate->product as $product){
                echo "<option value=$product->id>$product->name</option>";
            };
        };
        echo "</select>";
    }

    public function getPriceProduct($productId){
        $product = Product::find($productId);
        echo $product->price;
    }
}
