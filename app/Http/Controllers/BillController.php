<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Cate;
use App\Product;
use App\Http\Requests\CheckOutRequest;

class BillController extends Controller
{
    //
    public function getList(){
        $allBills = Bill::all();
        return view("admin.bill.list",['allBills'=>$allBills]);
    }

    public function getDelete($id){
        $bill = Bill::find($id);
        if($bill == null){
            return redirect("admin/bill/list")->with(['type'=>'danger','message'=>'Can\'t Find This Bill']);
        };
        $bill->delete();
        return redirect("admin/bill/list")->with("message","Success !!! Complete Delete Bill");
    }

    public function getAdd(){
        $allCates = Cate::all();
        return view("admin/bill/add",['allCates'=>$allCates]);
    }

    public function postAdd(CheckOutRequest $req){
        //Check empty Product
        if(isset($req->sltName) <=0){
            return redirect("admin/bill/add")->with(["message"=>"Please Enter Product","type"=>"danger"]);
        };

        //Check duplicate Product
        $arrayProductId = [];
        for($i=0; $i < count($req->sltName); $i++){
            $idProduct = $req->sltName[$i];
            if(in_array($idProduct, $arrayProductId)){
                return redirect("admin/bill/add")->with(["message"=>"Product Is Duplicate","type"=>"danger"]);
            }else{
                $arrayProductId[] = $idProduct;
            };
        };

        $totalPrice = 0;
        $bill = new Bill;
        $bill->first_name = $req->txtFname;
        $bill->last_name = $req->txtLname;
        $bill->phone = $req->txtPhone;
        $bill->address = $req->txtAddress;
        $bill->total_price = $totalPrice;
        $bill->save();

        
        for($i=0; $i < count($req->sltName); $i++){
            $idProduct = $req->sltName[$i];
            $quality = $req->txtQuality[$i];
            if($quality <= 0){
                continue;
            };

            $product = Product::find($idProduct);
            $detail = new BillDetail;
            $detail->product_id = $idProduct;
            $detail->name = $product->name;
            $detail->price = $product->price;
            $detail->quality = $quality;
            $detail->bill_id = $bill->id;
            $detail->save();

            $totalPrice += $product->price * $quality;
        };

        $bill->total_price = $totalPrice;

        //Check empty Product
        if($totalPrice <= 0){
            $bill->delete();
            return redirect("admin/bill/add")->with(["message"=>"Please Enter Product","type"=>"danger"]);
        };

        $bill->save();
        return redirect("admin/bill/list")->with("message","Success !!! Complete Add New Bill");
    }

    public function getEdit($id){
        $bill = Bill::find($id);
        if($bill == null){
            return redirect("admin/bill/list")->with(['type'=>'danger','message'=>'Can\'t Find This Bill']);
        };
        $allCates = Cate::all();
        return view("admin.bill.edit",['bill'=>$bill,'allCates'=>$allCates]);
    }

    public function postEdit(CheckOutRequest $req, $id){
        //Check empty Product
        if(isset($req->sltName) <=0){
            return redirect("admin/bill/edit/$id")->with(["message"=>"Please Enter Product","type"=>"danger"]);
        };

        //Check duplicate Product
        $arrayProductId = [];
        for($i=0; $i < count($req->sltName); $i++){
            $idProduct = $req->sltName[$i];
            if(in_array($idProduct, $arrayProductId)){
                return redirect()->back()->with(["message"=>"Product Is Duplicate","type"=>"danger"]);
            }else{
                $arrayProductId[] = $idProduct;
            };
        };

        $totalPrice = 0;
        $bill = Bill::find($id);
        if($bill == null){
            return redirect("admin/bill/list")->with(['type'=>'danger','message'=>'Can\'t Find This Bill']);
        };
        
        foreach($bill->detail as $detail){
            $detail->delete();
        };

        $bill->first_name = $req->txtFname;
        $bill->last_name = $req->txtLname;
        $bill->phone = $req->txtPhone;
        $bill->address = $req->txtAddress;
        $bill->total_price = $totalPrice;
        $bill->save();

        
        for($i=0; $i < count($req->sltName); $i++){
            $idProduct = $req->sltName[$i];
            $quality = $req->txtQuality[$i];
            if($quality <= 0){
                continue;
            };

            $product = Product::find($idProduct);
            $detail = new BillDetail;
            $detail->product_id = $idProduct;
            $detail->name = $product->name;
            $detail->price = $product->price;
            $detail->quality = $quality;
            $detail->bill_id = $bill->id;
            $detail->save();

            $totalPrice += $product->price * $quality;
        };

        $bill->total_price = $totalPrice;

        //Check empty Product
        if($totalPrice <= 0){
            $bill->delete();
            return redirect("admin/bill/list")->with(["message"=>"Bill Deleted Because Total Amount <= 0","type"=>"danger"]);
        };

        $bill->save();
        return redirect("admin/bill/list")->with("message","Success !!! Complete Add New Bill");
    }
}
