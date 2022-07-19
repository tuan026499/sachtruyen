<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\CategoryTruyen;
use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $truyen;
    private $chapter;
    private $category;
    private $categoryTruyen;
    public function __construct(Truyen $truyen, Chapter $chapter, Category $category, CategoryTruyen $categoryTruyen)
    {
        $this->truyen = $truyen;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->categoryTruyen = $categoryTruyen;
    }
    public function index(){
        $theloai = Theloai::all();
        $danhmuc  = Danhmuc::all();
        $category = CategoryTruyen::all();
        $categories = $this->category->all();
        return view('page.user.register',compact('theloai','danhmuc','category','categories'));
    }
    public function store(RegisterRequest $request){
        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'full_name'=>$request->full_name,
            'email' => $request->email,
        ];
        $user = new User();
        $user->create($data);
        return redirect(route('dang-nhap'))->with('success','đăng kí thành công');
    }
}
