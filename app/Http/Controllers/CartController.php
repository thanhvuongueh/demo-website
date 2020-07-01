<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class CartController extends Controller
{
    //
    public function addToCart($productId){
        $product = Product::find($productId);
        if($product == null){
            return false;
        };

        if(!session('cart')){
            session(['cart'=>['items'=>[],'totalPrice'=>0,'numberItems'=>0]]);
        };
        
        $items = session('cart')['items'];
        $totalPrice = session('cart')['totalPrice'];
        $numberItems = session('cart')['numberItems'];

        $item = ['name'=>$product->name,'price'=>$product->price,'quality'=>0,'image'=>$product->image];
        if(array_key_exists($productId,$items)){
            $item = $items[$productId];
        };
        $item['quality']++;
        $items[$productId] = $item;
        $totalPrice += $product->price;
        $numberItems++;
        
        session(['cart'=>['items'=>$items,'totalPrice'=>$totalPrice,'numberItems'=>$numberItems]]);
        return view("user.ajax.topcart");
    }

    

    public function removeCart(){
        session()->forget("cart");
        return redirect()->back();
    }

    public function increase($productId){
        $product = Product::find($productId);
        if($product == null){
            return false;
        };
        $items = session('cart')['items'];
        $totalPrice = session('cart')['totalPrice'];
        $numberItems = session('cart')['numberItems'];

        if(!array_key_exists($productId,$items)){
            return redirect()->back();
        };

        $items[$productId]['quality']++;
        $totalPrice += $product->price;
        $numberItems++;
        session(['cart'=>['items'=>$items,'totalPrice'=>$totalPrice,'numberItems'=>$numberItems]]);

        // for Ajax Cart Page
        $total = $items[$productId]['quality'] * $items[$productId]['price'];
        $numberItems = session('cart')?session('cart')['numberItems']:0;
        return ['totalPrice'=>$totalPrice,'total'=>$total,'numberItems'=>$numberItems];
    }

    public function reduce($productId){
        $product = Product::find($productId);
        if($product == null){
            return false;
        };

        $items = session('cart')['items'];
        $totalPrice = session('cart')['totalPrice'];
        $numberItems = session('cart')['numberItems'];

        if(!array_key_exists($productId,$items)){
            return redirect()->back();
        };

        $items[$productId]['quality']--;
        $totalPrice -= $product->price;
        $numberItems--;
        session(['cart'=>['items'=>$items,'totalPrice'=>$totalPrice,'numberItems'=>$numberItems]]);

        // for Ajax Cart Page
        $total = $items[$productId]['quality'] * $items[$productId]['price'];
        $numberItems = session('cart')?session('cart')['numberItems']:0;
        return ['totalPrice'=>$totalPrice,'total'=>$total,'numberItems'=>$numberItems];
    }

    public function update($productId, $numberProduct){
        $product = Product::find($productId);
        if($product == null){
            return false;
        };
        
        $items = session('cart')['items'];
        $totalPrice = session('cart')['totalPrice'];
        $numberItems = session('cart')['numberItems'];

        if(!array_key_exists($productId,$items)){
            return redirect()->back();
        };

        $items[$productId]['quality'] = $numberProduct;
        if($numberProduct == 0){
            unset($items[$productId]);
        };
        $totalPrice = 0;
        $numberItems = 0;
        foreach($items as $item){
            $totalPrice += $item['price'] * $item['quality'];
            $numberItems += $item['quality'];
        };

        session(['cart'=>['items'=>$items,'totalPrice'=>$totalPrice,'numberItems'=>$numberItems]]);

        // for Ajax Cart Page
        $total = ($numberProduct > 0) ? ($items[$productId]['quality'] * $items[$productId]['price']) : 0;
        
        $numberItems = session('cart')?session('cart')['numberItems']:0;
        return ['totalPrice'=>$totalPrice,'total'=>$total,'numberItems'=>$numberItems];
    }

    public function removeProduct($productId){
        $this->update($productId,0);
        if(session('cart')['totalPrice'] == 0){
            session()->forget('cart');
        };

        // for Ajax Cart Page
        $totalPrice = session('cart')?session('cart')['totalPrice']:0;
        $numberItems = session('cart')?session('cart')['numberItems']:0;
        return ['totalPrice'=>$totalPrice,'numberItems'=>$numberItems];
    }

    
}
