<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
       
        // return view('page.trangchu',['slide'=>$slide]);
        return view('page.trangchu',compact('slide'));
    }

    public function getLoaiSp(){
        return view('page.loai_sanpham');
    }

    public function getChiTietSp(){
        return view('page.chitiet_sanpham');
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
