<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;

class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
        // return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new',1)->get();
        $best_product = Product::where('new',0)->get();
        return view('page.trangchu',compact('slide','new_product','best_product'));
    }

    public function getLoaiSp($type){
        $sp_theoloai=Product::where('id_type',$type)->get();
        return view('page.loai_sanpham',compact('sp_theoloai'));
    }

    public function getChiTietSp(Request $reg){
        $sanpham=Product::where('id',$reg->id)->first();
        return view('page.chitiet_sanpham',compact('sanpham'));
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
}
