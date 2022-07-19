<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Theloai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhmucController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if($role=='1'){
            $theloai =  Theloai::all();
            $danhmuc = Danhmuc::all();;
            return view('BackEnd.Danhmuc.index',compact('theloai','danhmuc'));
        }else{
            return redirect(route('dang-nhap'))->with('failed','bạn cần đăng nhập');
        }
        
    }
    public function create()
    {
        $theloai =  Theloai::all();
        $danhmuc = Danhmuc::all();;
        return view('BackEnd.Danhmuc.Create_Form',compact('theloai','danhmuc'));
    }
    public function store(Request $request){
        $danhmuc = new Danhmuc();
        $danhmuc->fill($request->all());
        $danhmuc->save();
        return redirect(route('danhmuc.index'))->with('status','thêm mới thành công');
    }
    public function delete($id){
        $danhmuc = Danhmuc::findOrFail($id);
        if(!$danhmuc){
            return redirect()->back()->with('status','không tìm thấy dữ liệu!');
        }
        $danhmuc->destroy($id);
        $danhmuc->save();
        return redirect()->back()->with('status','xoá thành công');
    }
    public function edit($id){
        $danhmuc = Danhmuc::findOrFail($id);
        return view('BackEnd.Danhmuc.Edit_Form',compact('danhmuc'));
    }
    public function update(Request $request,$id){
        $danhmuc = Danhmuc::findOrFail($id);
        $danhmuc->ten_danh_muc= $request->ten_danh_muc;
        $danhmuc->mo_ta= $request->mo_ta;
        $danhmuc->slug_danh_muc= $request->slug_danh_muc;
        $danhmuc->trang_thai= $request->trang_thai;
        $danhmuc->save();
        return redirect(route('danhmuc.index'))->with('status','sửa danh mục thành công');

    }
}
