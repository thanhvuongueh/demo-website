<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use Mail;
use App\Http\Requests\CheckOutRequest;
use App\Bill;
use App\BillDetail;

class FrontendController extends Controller
{
    //
    public function getHomePage(){
        $latestProducts = Product::orderBy("id","ASC")->take(4)->get();
        $hotProducts = Product::all()->where('hot',1)->random(4);
        return view("user.pages.home",['latestProducts'=>$latestProducts,'hotProducts'=>$hotProducts]);
    }

    public function getCategoryPage($id, $alias, $method = null){
        $cate = Cate::find($id);
        if($cate == null){
            return redirect("")->with(['type'=>'danger','message'=>'Can\'t Find This Page']);
        };
        $allSubCateId = getIdChildCate($id);
        array_unshift($allSubCateId,$id);

        if($method == "name"){
            $products = Product::whereIn('cate_id',$allSubCateId)->orderBy("name","ASC")->paginate(6);
        }elseif($method == "price"){
            $products = Product::whereIn('cate_id',$allSubCateId)->orderBy("price","ASC")->paginate(6);
        }else{
            $products = Product::whereIn('cate_id',$allSubCateId)->orderBy("id","DESC")->paginate(6);
        };

        $latestProduct = Product::whereIn("cate_id",$allSubCateId)->orderBy("id","DESC")->take(2)->get();
        $hotProducts = Product::whereIn("cate_id",$allSubCateId)->where("hot",1)->take(2)->get();
        return view("user.pages.cate",['cate'=>$cate,'products'=>$products,'latestProduct'=>$latestProduct,'hotProducts'=>$hotProducts,'method'=>$method]);
    }

    public function getProductPage($id, $alias){
        $product = Product::find($id);
        if($product == null){
            return redirect("")->with(['type'=>'danger','message'=>'Can\'t Find This Page']);
        };
        $relatedProducts = Product::where("cate_id",$product->cate_id)->where("id","<>",$id)->take(4)->get();
        return view("user.pages.product",['product'=>$product,'relatedProducts'=>$relatedProducts]);
    }

    public function getContactPage(){
        return view("user.pages.contact");
    }

    public function postContactPage(Request $req){
        $data = ['name'=>$req->name,'email'=>$req->email,'phone'=>$req->phone,'content'=>$req->message];
        Mail::send('email',$data,function($msg) use ($req) {
            $msg->from("thanhvuong.free@gmail.com","Admin");
            $msg->to("thanhvuong.free@gmail.com","Admin")->subject("Mail liên hệ");
        });
        return redirect("/");
    }

    public function getCartPage(){
        return view("user.pages.cart");
    }

    public function getCheckoutPage(){
        return view("user.pages.checkout");
    }

    public function postCheckOutPage(CheckOutRequest $req){
        if(!session('cart')){
            return redirect()->back()->with(["message"=>"Please Choose Your Product","type"=>"danger"]);
        };
        

        $bill = new Bill;
        $bill->first_name = $req->txtFname;
        $bill->last_name = $req->txtLname;
        $bill->phone = $req->txtPhone;
        $bill->address = $req->txtAddress;
        $bill->total_price = 0;
        $bill->save();

        $total_price = 0;
        foreach(session('cart')['items'] as $id => $item){
            $detail = new BillDetail;
            $detail->product_id = $id;
            $detail->name = $item['name'];
            $detail->price = $item['price'];
            $detail->quality = $item['quality'];
            if($detail->quality <= 0){
                continue;
            };
            $detail->bill_id = $bill->id;
            $detail->save();
            $total_price += $item['price'] * $item['quality'];
        };

        $bill->total_price = $total_price;
        if($bill->total_price <= 0){
            return redirect()->back()->with(["message"=>"Please Choose Your Product","type"=>"danger"]);
        };
        $bill->save();

        session()->forget('cart');
        return redirect('/')->with('message','Success !!! Complete Order Products');
    }

    public function getSearchPage(Request $req){
        $str = $req->txtSearch;
        $products = Product::where('name','LIKE','%'.$str.'%')->orderBy("id","DESC")->paginate(6)->appends(request()->query());
        $latestProduct = Product::where('name','like','%'.$str.'%')->orderBy("id","DESC")->take(2)->get();
        $hotProducts = Product::where('name','like','%'.$str.'%')->where("hot",1)->take(2)->get();
        return view("user.pages.cate",['products'=>$products,'latestProduct'=>$latestProduct,'hotProducts'=>$hotProducts,'search'=>$str]);
    }
    
}
