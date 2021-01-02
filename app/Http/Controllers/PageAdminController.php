<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class PageAdminController extends Controller
{
    public function getIndex(){
        
        return view('pageadmin.trangchuadmin');
    }

    public function getDangNhap(){
        return view('pageadmin.dangnhapadmin');
    }

    public function postDangNhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.requied'=>'Please enter your email',
                'email.email'=>'Email format is not correct',
                'password.requied'=>'Please enter a password',
                'password.min'=>'password at least 6 characters',
                'password.max'=>'password must not exceed 20 characters'
            ]
            );
            $credentials = array('email'=>$req->email,
                                'password'=>$req->password);
            if(Auth::attempt($credentials)){
                return redirect()->route('trangchuadmin')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
    }
}
