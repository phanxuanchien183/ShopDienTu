<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserAdmin;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class PageAdminController extends Controller
{
    public function getIndex(){
        if (Auth::check()){
            $product= Product::all();
            return view('pageadmin.trangchuadmin',compact('product'));
            // return view('pageadmin.trangchuadmin');
        }
        else{
            return redirect()->route('dangnhapadmin')->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        
    }

    public function postEditProduct(Request $req){
        $this->validate($req,
            [
                // 'email'=>'required|email|unique:users,email',
                // 'password'=>'required|min:6|max:20',
                // 'fullname'=>'required',
                // 're_password'=>'required|same:password',

                'idEditProductName'=>'required',
                'productname'=>'required',
                'idtype'=>'required',
                'description'=>'required',
                'unitprice'=>'required',
                'image'=>'required',
                'unit'=>'required',
                'new'=>'required'
            ],
            [
                'email.requied'=>'Please enter your email',
                'email.email'=>'Email format is not correct',
                'email.unique'=>'Email already exists',
                'password.requied'=>'Please enter a password',
                're_password.same'=>'password is not the same',
                'password.min'=>'password at least 6 characters',
                'password.max'=>'password must not exceed 20 characters'
            ],
        );
        $user= new User();
        $user->full_name =$req-> fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->adress;
        $user->save();
        return redirect()->back()->with('thanhcong','Create Account Success');
    }

    public function getCustomer(){
        if (Auth::check()){
            $customer= Customer::all();
            return view('pageadmin.customer',compact('customer'));
            // return view('pageadmin.trangchuadmin');
        }
        else{
            return redirect()->route('dangnhapadmin')->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        
    }

    public function getUser(){
        if (Auth::check()){
            $user= User::all();
            return view('pageadmin.user',compact('user'));
            // return view('pageadmin.trangchuadmin');
        }
        else{
            return redirect()->route('dangnhapadmin')->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        
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
                                'password'=>$req->password,
                                'role'=>1);
            if(Auth::attempt($credentials)){
                return redirect()->route('trangchuadmin')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
    }
}
