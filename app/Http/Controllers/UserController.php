<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\User;


class UserController extends Controller
{
    //
    public function getList(){
        $allUsers = User::all();
        return view("admin.user.list",['allUsers'=>$allUsers]);
    }

    public function getAdd(){
        return view("admin.user.add");
    }

    public function postAdd(UserRequest $req){
        if(Auth::user()->level >= $req->rdoLevel && Auth::user()->id != 1){
            return redirect("admin/user/add")->with(['type'=>'danger','message'=>'You Can\'t Add User With This Level']);
        };
        
        $user = new User;
        $user->username = $req->txtUser;
        $user->password = bcrypt($req->txtPass);
        $user->email = $req->txtEmail;
        $user->level = $req->rdoLevel;
        $user->remember_token = $req->_token;
        $user->save();

        return redirect("admin/user/list")->with("message","Success !!! Complete Add New User");
    }

    public function getEdit($id){
        $user = User::find($id);
        if($user == null){
            return redirect("admin/user/list")->with(['type'=>'danger','message'=>'Can\'t Find This User']);
        };
        $currentUser = Auth::user();
        if($currentUser->id != 1 && $currentUser->id != $user->id && $user->level == 1){
            return redirect()->back()->with(['type'=>'danger','message'=>'Error !!! You can\'t edit this User']);
        };
        return view("admin.user.edit",['user'=>$user]);

    }

    public function postEdit($id, Request $req){
        $currentUser = Auth::user();
        $user = User::find($id);
        if($user == null){
            return redirect("admin/user/list")->with(['type'=>'danger','message'=>'Can\'t Find This User']);
        };

        if(isset($req->txtPass)){
            $this->validate($req,[
                'txtRePass'=>'same:txtPass'
            ],[
                'txtRePass.same'=>'RePassword Don\'t Match'
            ]);
            $user->password = bcrypt($req->txtPass);
        };
        $user->email = $req->txtEmail;
        $user->level = $req->rdoLevel?$req->rdoLevel:$user->level;
        $user->save();

        return redirect("admin/user/list")->with("message","Success !!! Complete Update User");
    }

    public function getDelete($id){
        $currentUser = Auth::user();
        $user = User::find($id);
        if($user == null){
            return redirect("admin/user/list")->with(['type'=>'danger','message'=>'Can\'t Find This User']);
        };
        if(($currentUser->id == 1 && $user->id != 1) || ($currentUser->level == 1 and $user->level == 2)){
            $user->delete();
            return redirect("admin/user/list")->with("message","Success !!! Complete Delete User");
        };
        return redirect("admin/user/list")->with(["type"=>"danger","message"=>"Sorry ! You can't delete this User"]);
    }

    public function getLogin(){
        if(Auth::check()){
            return redirect("admin/product/list");
        };
        return view('admin.login');
    }

    public function postLogin(LoginRequest $req){
        $login = [
            'username' => $req->txtUser,
            'password' => $req->txtPass
        ];
        $remember = $req->remember;

        if(Auth::attempt($login, $remember)){
            return redirect("admin/product/list")->with("message","Login Success !!!");
        }else{
            return redirect("admin/login")->with(['type'=>'danger','message'=>'Username or Password wrong']);
        };
    }

    public function getLogout(){
        Auth::logout();
        return redirect(route("login"));
    }
}
