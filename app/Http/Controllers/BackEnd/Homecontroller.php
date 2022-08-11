<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Danhmuc;
use App\Models\Role;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    public function index(){
        
        if(Auth::check()){
            if($role =Auth::user()->role){
                if($role==1){
                    $theloai = Theloai::where('id','DESC')->get();
                    $danhmuc  = Danhmuc::where('id','DESC')->get();
                    $category = Category::where('id','DESC')->get();
                    // $role = Role::where('id','DESC')->get();
                    $truyen = Truyen::where('id','DESC')->get();
                    $user = User::where('id','DESC')->get();
                    // return view('BackEnd.index',['danhmuc'=>$danhmuc,'theloai'=>$theloai,'']);
                    return view('BackEnd.index',compact('danhmuc','theloai','category','truyen','user'));
                } 
                else{
                    return abort(404);
                    // return redirect(route('dang-nhap'))->with('failed','ban can dang nhap');
            }       
        }
        }
        
    }
//     public function __construct()
// {
//     $this->middleware('guest')->except('dang-xuat');
//     $this->redirectTo = url()->previous();
// }
    
}
