<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserAdmin;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageAdminController extends Controller
{
    public function getIndex(){
        if (Auth::check()){
            $product= Product::all();
            return view('pageadmin.trangchuadmin',compact('product'));
            // return view('pageadmin.trangchuadmin');
        }
        else{
            return redirect()->route('dangnhapadmin');
        }
        
    }
    
    // Delete Product
    public function getDeleteProduct($id){
        $Product= new Product();
        $product= $Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    // Delete Customer
    public function getDeleteCustomer($id){
        $Customer= new Customer();
        $customer= $Customer::find($id);
        $customer->delete();
        return redirect()->back()->with('thanhcong','Delete customer Success');
    }

    // Delete User
    public function getDeleteUser($id){
        $User= new User();
        $user= $User::find($id);
        $user->delete();
        return redirect()->back();
    }

    // Delete Product Type
    public function getDeleteProductType($id){
        $ProductType= new ProductType();
        $producttype= $ProductType::find($id);
        $producttype->delete();
        return redirect()->back();
    }

    // public function postEditProduct(Request $req){
    //     $this->validate($req,
    //         [
    //             // 'email'=>'required|email|unique:users,email',
    //             // 'password'=>'required|min:6|max:20',
    //             // 'fullname'=>'required',
    //             // 're_password'=>'required|same:password',

    //             'idEditProductName'=>'required',
    //             'productname'=>'required',
    //             'idtype'=>'required',
    //             'description'=>'required',
    //             'unitprice'=>'required',
    //             'image'=>'required',
    //             'unit'=>'required',
    //             'new'=>'required'
    //         ],
    //         [
    //             'email.requied'=>'Please enter your email',
    //             'email.email'=>'Email format is not correct',
    //             'email.unique'=>'Email already exists',
    //             'password.requied'=>'Please enter a password',
    //             're_password.same'=>'password is not the same',
    //             'password.min'=>'password at least 6 characters',
    //             'password.max'=>'password must not exceed 20 characters'
    //         ],
    //     );
    //     $user= new User();
    //     $user->full_name =$req-> fullname;
    //     $user->email = $req->email;
    //     $user->password = Hash::make($req->password);
    //     $user->phone = $req->phone;
    //     $user->address = $req->adress;
    //     $user->save();
    //     return redirect()->back()->with('thanhcong','Create Account Success');
    // }

    

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

    // Add Customer
    public function postAddCustomer(Request $req){
        $this->validate($req,
            [
                

                // 'idEditCustomerName'=>'required',
                'customername'=>'required',
                'gender'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone_number'=>'required',
                // 'note'=>'required'
            ],
            [
                'email.requied'=>'Please enter your email',
                'email.email'=>'Email format is not correct',
                // 'idEditCustomerName.requied'=>'Please enter your ID',
                'customername.requied'=>'Please enter your Customer Name',
                'gender.requied'=>'Please enter your Gender',
                'address.requied'=>'Please enter your Address',
                'phone_number.requied'=>'Please enter your Phone Number',
                // 'note.requied'=>'Please enter your Note',
                
            ],
        );
        $customer= new Customer();
        $customer->id =$req-> idEditCustomerName;
        $customer->name =$req-> customername;
        $customer->gender =$req-> gender;
        $customer->gender =$req-> gender;
        $customer->email =$req-> email;
        $customer->address =$req-> address;
        $customer->phone_number =$req-> phone_number;
        $customer->note =$req-> note;            
        $customer->save();
        return redirect()->back()->with('thanhcong','Create customer Success');
    }

    // Edit Customer
    
    public function getSingleCustomer($id){
        $customer=Customer::where('id',$id)->get();
        // $customer=Customer::all();
        return view('pageadmin.update_customer',compact('customer'));
    }

    // public function getUpdateCustomer(Request $req, $id)
    // {
    //     $id=$req->input('id');
    //     $name=$req->input('name');
    //     $gender=$req->input('gender');
    //     $email=$req->input('email');
    //     $address=$req->input('address');
    //     $phone_number=$req->input('phone_number');
    //     $note=$req->input('note');
    // }
    
    public function getUpdateCustomer(Request $req,$id){
        // $idcustomer=$req->input('id');
        $name=$req->input('name');
        $gender=$req->input('gender');
        $email=$req->input('email');
        $address=$req->input('address');
        $phone_number=$req->input('phone_number');
        $note=$req->input('note');
        DB::update('update Customer set  name = ?, gender = ?, email = ?, address = ?, phone_number = ?, note = ?
        where id = ?', [$name,$gender,$email,$address,$phone_number,$note, $id]);

        return redirect()->route('customeradmin')->with('thanhcong','Data Update');
    }


    // public function postEditCustomer(Request $req,$id){
    //     // $this->validate($req,
    //     //     [
               

    //     //         // 'idEditCustomerName'=>'required',
    //     //         'customername'=>'required',
    //     //         'gender'=>'required',
    //     //         'email'=>'required|email',
    //     //         'address'=>'required',
    //     //         'phone_number'=>'required',
    //     //         // 'note'=>'required'
    //     //     ],
    //     //     [
    //     //         'email.requied'=>'Please enter your email',
    //     //         'email.email'=>'Email format is not correct',
    //     //         // 'idEditCustomerName.requied'=>'Please enter your ID',
    //     //         'customername.requied'=>'Please enter your Customer Name',
    //     //         'gender.requied'=>'Please enter your Gender',
    //     //         'address.requied'=>'Please enter your Address',
    //     //         'phone_number.requied'=>'Please enter your Phone Number',
    //     //         // 'note.requied'=>'Please enter your Note',
                
    //     //     ],
    //     // );
    //     $customer= new Customer();
    //     // $customer->id =$req-> idEditCustomerName;
    //     // // $customer =  $customer::find($req-> idEditCustomerName);
    //     // // $customer = Customer::find($req-> idEditCustomerName);
    //     // $customer->name =$req-> customername;
    //     // $customer->gender =$req-> gender;
    //     // $customer->gender =$req-> gender;
    //     // $customer->email =$req-> email;
    //     // $customer->address =$req-> address;
    //     // $customer->phone_number =$req-> phone_number;
    //     // $customer->note =$req-> note;            
    //     // $customer->save();
    //     $customer->update($req->all());
    //     $customer = Customer::findOrFail($id);
    //     $customer->update($req->all());

    //     // return $customer;
    //     return redirect()->route('customeradmin')->with('thanhcong','Update customer Success');

        
    // }

    

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

    public function getProductType(){
        if (Auth::check()){
            $producttype= ProductType::all();
            return view('pageadmin.product_type',compact('producttype'));
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
