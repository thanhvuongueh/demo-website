<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use App\ProductImage;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use File;


class ProductController extends Controller
{
    //
    public function getList(){
        $allProduct = Product::all();
        return view('admin.product.list',['allProduct'=>$allProduct]);
    }

    public function getAdd(){
        $cate = Cate::all();
        return view('admin.product.add',['cate'=>$cate]);
    }

    public function postAdd(ProductRequest $req){
        $fileName = time().$req->file('fImages')->getClientOriginalName();
        $product = new Product;
        $product->name = $req->txtName;
        $product->alias = changeTitle($req->txtName);
        $product->price = $req->txtPrice;
        $product->intro = $req->txtIntro;
        $product->content = $req->txtContent;
        $product->image = $fileName;
        $req->file('fImages')->move('upload/product',$fileName);
        $product->keywords = $req->txtKeyword;
        $product->description = $req->txtDescription;
        $product->hot = $req->rdoHot;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $req->txtCate;
        $product->save();

        if($req->hasFile('fDetailProduct')){
            $stt = 0;
            foreach($req->fDetailProduct as $file){
                $stt++;
                if(isset($file)){
                    $detailImageName = time().$stt.$file->getClientOriginalName();
                    $product_image = new ProductImage;
                    $product_image->image = $detailImageName;
                    $file->move('upload/product/detail',$detailImageName);
                    $product_image->product_id = $product->id;
                    $product_image->save();
                };  
            };
        };

        return redirect("admin/product/list")->with("message","Success !!! Complete Add New Product");  
    }

    public function getDelete($id){
        $product = Product::find($id);
        if($product == null){
            return redirect("admin/product/list")->with(['type'=>'danger','message'=>'Can\'t Find This Product']);
        };
        
        $productImages = Product::find($id)->pimage;
        foreach($productImages as $image){
            File::delete("upload/product/detail/".$image->image);
        };
        
        File::delete("upload/product/".$product->image);
        $product->delete();

        return redirect("admin/product/list")->with("message","Success !!! Complete Delete Product");
    }

    public function getEdit($id){
        $product = Product::find($id);
        if($product == null){
            return redirect("admin/product/list")->with(['type'=>'danger','message'=>'Can\'t Find This Product']);
        };
        $cate = Cate::all();
        return view("admin.product.edit",['product'=>$product,'cate'=>$cate]);
    }

    public function postEdit($id, Request $req){
        $product = Product::find($id);
        if($product == null){
            return redirect("admin/product/list")->with(['type'=>'danger','message'=>'Can\'t Find This Product']);
        };
        if($req->hasFile('fImages')){
            //Xoa hinh cu
            File::delete("upload/product/".$product->image);
            //Up hinh moi
            $fileName = time().$req->file('fImages')->getClientOriginalName();
            $product->image = $fileName;
            $req->file('fImages')->move('upload/product',$fileName);
        };
        $product->name = $req->txtName;
        $product->alias = changeTitle($req->txtName);
        $product->price = $req->txtPrice;
        $product->intro = $req->txtIntro;
        $product->content = $req->txtContent;
        $product->keywords = $req->txtKeyword;
        $product->description = $req->txtDescription;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $req->txtCate;
        $product->save();

        if($req->hasFile('fDetailProduct')){
            $stt = 0;
            foreach($req->fDetailProduct as $file){
                $stt++;
                if(isset($file)){
                    $detailImageName = time().$stt.$file->getClientOriginalName();
                    $product_image = new ProductImage;
                    $product_image->image = $detailImageName;
                    $file->move('upload/product/detail',$detailImageName);
                    $product_image->product_id = $product->id;
                    $product_image->save();
                };  
            };
        };

        return redirect("admin/product/edit/$id")->with("message","Success !!! Complete Update Product");
    }

    public function postDeleteImage($id){
        $image = ProductImage::find($id);
        File::delete("upload/product/detail/".$image->image);
        $image->delete();
        return "Oke";
    }
}
