<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            $role = Auth::user()->role;
        if($role=='1'){
            $users = User::orderBy('id','ASC')->paginate(10);
            return view('BackEnd.User.index',compact('users'));               
        }else{
            return redirect(route('trang-chu'));
            }
        }
    }
    public function edit($username){
        $users = User::where('username',$username)->first();
        if(!$users){
            return redirect()->back()->with('failed','không tìm thấy dữ liệu!');
        }
        return view('BackEnd.User.edit',compact('users'));
    }
    public function saveEdit($username, Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $users = User::where('username',$username)->first();
        if(!$users){
            return redirect()->back()->with('failed','không tìm thấy dữ liệu!');
        }
        $users->role = $request->role;
        $users->save();
        return redirect()->back()->with('success','thay đổi thành công');
    }
}
