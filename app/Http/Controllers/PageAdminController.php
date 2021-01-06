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
            if (Auth::user()->role==1){
                $product= Product::all();
                return view('pageadmin.trangchuadmin',compact('product'));
                // return view('pageadmin.trangchuadmin');
            }
            return redirect()->route('dangnhapadmin');
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
            if (Auth::user()->role==1){
                $customer= Customer::all();
                return view('pageadmin.customer',compact('customer'));
                // return view('pageadmin.trangchuadmin');
            }
            return redirect()->route('dangnhapadmin');
        }
        else{
            return redirect()->route('dangnhapadmin');
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

    // Add User
    public function postAddUser(Request $req){
        $this->validate($req,
            [
                

                // 'idEditCustomerName'=>'required',
                'full_name'=>'required',
                'password'=>'required|min:6|max:20',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required',
                'address'=>'required',
                // 'note'=>'required'
            ],
            [
                'email.requied'=>'Please enter your email',
                'email.email'=>'Email format is not correct',
                'email.unique'=>'Email already exists',
                // 'idEditCustomerName.requied'=>'Please enter your ID',
                'full_name.requied'=>'Please enter your Name',
                'password.requied'=>'Please enter a password',
                'password.min'=>'password at least 6 characters',
                'password.max'=>'password must not exceed 20 characters',
                'address.requied'=>'Please enter your Address',
                'phone_number.requied'=>'Please enter your Phone Number',
                // 'note.requied'=>'Please enter your Note',
                
            ],
        );
        $user= new User();
        $user->id =$req-> idEditUserName;
        $user->full_name =$req-> full_name;
        $user->email =$req-> email;
        // $user->password =Hash::make($req->password);
        $user->password = Hash::make($req->password);
        $user->phone =$req-> phone;
        $user->address =$req-> address;
        $user->remember_token =$req-> remember_token;
        // $user->note =$req-> note;            
        $user->save();
        return redirect()->back()->with('thanhcong','Create customer Success');
    }

    // Add Product ---- CHƯA XONG
    public function postAddProduct(Request $req){
        $this->validate($req,
            [
                

                // 'idEditCustomerName'=>'required',
                'productname'=>'required',
                // 'password'=>'required|min:6|max:20',
                // 'email'=>'required|email|unique:users,email',
                'idtype'=>'required',
                'description'=>'required',
                'unitprice'=>'required',
                'promotionprice'=>'required',
                // 'image'=>'required',
                'unit'=>'required',
                'new'=>'required',
                // 'note'=>'required'
            ],
            [
                'email.requied'=>'Please enter your email',
                'email.email'=>'Email format is not correct',
                'email.unique'=>'Email already exists',
                // 'idEditCustomerName.requied'=>'Please enter your ID',
                'full_name.requied'=>'Please enter your Name',
                'password.requied'=>'Please enter a password',
                'password.min'=>'password at least 6 characters',
                'password.max'=>'password must not exceed 20 characters',
                'address.requied'=>'Please enter your Address',
                'phone_number.requied'=>'Please enter your Phone Number',
                // 'note.requied'=>'Please enter your Note',
                
            ],
        );
        $product= new Product();
        $product->id =$req-> idEditUserName;
        $product->full_name =$req-> full_name;
        $product->email =$req-> email;
        // $user->password =Hash::make($req->password);
        $product->password = Hash::make($req->password);
        $product->phone =$req-> phone;
        $product->address =$req-> address;
        $product->remember_token =$req-> remember_token;
        // $user->note =$req-> note;            
        $product->save();
        return redirect()->back()->with('thanhcong','Create customer Success');
    }

    // Edit Customer
    
     // lấy thông tin admin 
    public function getSingleCustomer($id){
        $customer=Customer::where('id',$id)->get();
        // $customer=Customer::all();
        return view('pageadmin.update_customer',compact('customer'));
    }

    // lấy thông tin user 
    public function getSingleUser($id){
        $user=User::where('id',$id)->get();
        // $customer=Customer::all();
        return view('pageadmin.update_users',compact('user'));
    }
    
    // cập nhật thông tin customer
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

    // cật nhật thông tin user
    public function getUpdateUser(Request $req,$id){
        // $idcustomer=$req->input('id');
        // $id=$req->input('id');
        $full_name=$req->input('full_name');
        $email=$req->input('email');
        // $password=$req->input('password');
        $password = Hash::make($req->password);
        $phone=$req->input('phone');
        $address=$req->input('address');
        $remember_token=$req->input('remember_token');
        DB::update('update users set  full_name = ?, email = ?, password = ?, phone = ?, address = ?, remember_token = ?
        where id = ?', [$full_name,$email,$password,$phone,$address,$remember_token, $id]);

        return redirect()->route('useradmin')->with('thanhcong','Data Update');
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
            if (Auth::user()->role==1){
                 $user= User::all();
                return view('pageadmin.user',compact('user'));
                // return view('pageadmin.trangchuadmin');
            }
            return redirect()->route('dangnhapadmin');
        }
        else{
            return redirect()->route('dangnhapadmin');
        }
        
    }

    public function getProductType(){
        if (Auth::check()){
            if (Auth::user()->role==1){
                $producttype= ProductType::all();
                return view('pageadmin.product_type',compact('producttype'));
                // return view('pageadmin.trangchuadmin');
            }
            return redirect()->route('dangnhapadmin');
        }
        else{
            return redirect()->route('dangnhapadmin');
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
                return redirect()->route('trangchuadmin')->with(['flag'=>'success','message'=>'Login Success']);
            }
            else {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Login fail']);
            }
    }
}
