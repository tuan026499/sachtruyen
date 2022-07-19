<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\TheLoaiRequest;
use App\Http\Requests\UpdateTheloaiRequest;
use App\Models\Danhmuc;
use App\Models\Theloai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TheloaiController extends Controller
{
    public function index(){
        if(Auth::check()){
        $theloai =  Theloai::all();
        $danhmuc = Danhmuc::all();;
        return view('BackEnd.Theloai.index',compact('theloai','danhmuc'));
        }else{
            return redirect(route('dang-nhap'))->with('failed','bạn cần đăng nhập');
        }
    }
    public function CreateForm(){
        $theloai =  Theloai::all();
        $danhmuc = Danhmuc::all();;
        return view('BackEnd.Theloai.Create_Form',compact('theloai','danhmuc'));
    }
    public function SaveCreateForm(TheLoaiRequest $request){
        $theloai = new Theloai();
        $theloai = $request->all();
        Theloai::create($theloai);
        return redirect(route('the-loai.index'))->with('trangthai','thêm mới thành công');
    }
    public function EditForm($id){
        // $theloai = Theloai::where('slug_the_loai',$id)->first();
        $theloai = Theloai::findOrFail($id);
        if(!$theloai){
            return redirect()->back();
        }
        $danhmuc = Danhmuc::all();;

        return view('BackEnd.Theloai.Edit_Form',compact('theloai','danhmuc'));
    }
    public function SaveEditForm(TheLoaiRequest $request,Theloai $theloais,$id){
        // $theloais = Theloai::where('slug_the_loai',$slug)->firstOrfail();
        $theloais = Theloai::findOrFail($id);
        $theloais->ten_the_loai = $request->ten_the_loai;
        $theloais->mo_ta = $request->mo_ta;
        $theloais->trang_thai = $request->trang_thai;
        $theloais->slug_the_loai = $request->slug_the_loai;
        $theloais->save();
        return redirect(route('the-loai.index'))->with('status','Sửa thành công');
    }
    public function DeleteTheloai($id){
        $theloai = Theloai::findOrFail($id);
        if(!$theloai){
            return redirect()->back()->with('status','không tìm thấy dữ liệu!');
        }
        $theloai->destroy($id);
        $theloai->save();
        return redirect()->back()->with('status','Xoá thành công');
    }
}
