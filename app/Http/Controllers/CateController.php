<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller
{
    //
    public function getList(){
        $cate = Cate::all();
        return view('admin.cate.list',['cate'=>$cate]);
    }

    public function getAdd(){
        $cate = Cate::all();
        return view('admin.cate.add',['cate'=>$cate]);
    }

    public function postAdd(CateRequest $req){
        $cate = new Cate;
        $cate->name = $req->txtCateName;
        $cate->alias = changeTitle($req->txtCateName);
        $cate->order = $req->txtOrder;
        $cate->parent_id = $req->txtCateParent;
        $cate->keyword = $req->txtKeywords;
        $cate->description = $req->txtDescription;
        $cate->save();

        return redirect('admin/cate/list')->with('message','Success !!! Complete Add Category');
    }

    public function getEdit($id){
        $allCate = Cate::all();
        $cate = Cate::find($id);
        if($cate == null){
            return redirect("admin/cate/list")->with(['type'=>'danger','message'=>'Can\'t Find This Category']);
        };
        return view('admin.cate.edit',['allCate'=>$allCate, 'cate'=>$cate]);
    }

    public function postEdit($id, Request $req){
        $this->validate($req,[
            'txtCateName'=>'required'
        ],[
            'txtCateName.required'=>'Please Enter Category Name'
        ]);
        $cate = Cate::find($id);
        if($cate == null){
            return redirect("admin/cate/list")->with(['type'=>'danger','message'=>'Can\'t Find This Category']);
        };
        $cate->name = $req->txtCateName;
        $cate->alias = changeTitle($req->txtCateName);
        $cate->order = $req->txtOrder;
        $cate->parent_id = $req->txtCateParent;
        $cate->keyword = $req->txtKeywords;
        $cate->description = $req->txtDescription;
        $cate->save();

        return redirect('admin/cate/edit/'.$id)->with('message','Success !!! Complete Edit Category');
    }

    public function getDelete($id){
        $cate = Cate::find($id);
        if($cate == null){
            return redirect("admin/cate/list")->with(['type'=>'danger','message'=>'Can\'t Find This Category']);
        };
        $numberChild = Cate::where('parent_id',$id)->count();
        if($numberChild == 0){
            $cate->delete();
            return redirect('admin/cate/list')->with('message','Success !!! Complete Delete Category');
        }else{
            return redirect('admin/cate/list')->with(['message'=>'Error !!! You need delete all Child Categories','type'=>'danger']);
        };
        
    }

}
