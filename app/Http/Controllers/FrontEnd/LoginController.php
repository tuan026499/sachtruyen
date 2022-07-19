<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTruyen;
use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $truyen;
    private $chapter;
    private $category;
    private $categoryTruyen;
    private $user;
    public function __construct(Truyen $truyen, Chapter $chapter, Category $category, CategoryTruyen $categoryTruyen,User $user)
    {
        $this->truyen = $truyen;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->categoryTruyen = $categoryTruyen ;
        $this->user = $user;
        // $this->middleware('auth');
    }
    public function index(){
        $user = Auth::check();
        $theloai = Theloai::all();
        $danhmuc  = Danhmuc::all();
        $category = Category::all();
        $categories = $this->category->all();
        return view('page.user.login',compact('theloai','danhmuc','category','categories'));
    }
    public function PostLogin(LoginRequest $request){
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // The user is active, not suspended, and exists.
            return redirect(route('trang-chu'));
        }else{
            return redirect()->back()->with('failed','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect(route('trang-chu'));
    }
}