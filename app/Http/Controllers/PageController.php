<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Cart;
use Session;

class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
        // return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new',1)->get();
        $best_product = Product::where('new',0)->get();
        $sell_product = Product::where('new',2)->get();
        $laptop=Product::where('id_type',7)->get();
        $tv=Product::where('id_type',1)->get();
        return view('page.trangchu',compact('slide','new_product','best_product','sell_product','laptop','tv'));
    }

    public function getLoaiSp($type){
        $sp_theoloai=Product::where('id_type',$type)->paginate(5);
        return view('page.loai_sanpham',compact('sp_theoloai'));
    }

    public function getChiTietSp(Request $reg){
        $sanpham=Product::where('id',$reg->id)->first();
        return view('page.chitiet_sanpham',compact('sanpham'));
    }

    public function getModalChiTietSp(Request $reg){
        $sanpham=Product::where('id',$reg->id)->first();
        return view(redirect()->back(),compact('sanpham'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioHang(){
        return view('page.giohang');
    }

    public function getThanhToan(){
        return view('page.thanhtoan');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    public function getError(){
        return view('page.error');
    }

    public function getFaq(){
        return view('page.faq');
    }

    public function getAddtoCart(Request $req, $id){
        $product= Product::find($id);
        $oldCart= Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDeltoCart($id){
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart= new cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
}
