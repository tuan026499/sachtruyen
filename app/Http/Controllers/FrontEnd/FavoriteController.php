<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Danhmuc;
use App\Models\Favorite_comic;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class FavoriteController extends Controller
{
    public function __construct(Truyen $truyen,User $user,Favorite_comic $favorite_comic, Category $category){
        $this->truyen = $truyen;
        $this->user= $user;
        $this->favorite_comic = $favorite_comic;
        $this->category = $category;
    }


    public function store($truyen){

       if(auth::check()){
        Auth::user()->favorite_comic()->attach($truyen);
        return redirect()->back()->with('success','thêm truyện yêu thích thành công');
       }else{
        return redirect(route('dang-nhap'))->with('failed','bạn cần đăng nhập');
       }
    }
    public function remove($truyen){
        $user = Auth::user();
        $user->favorite_comic()->detach($truyen); 
        return redirect()->back()->with('success','Xoá truyện yêu thích thành công');
    }
    public function show_truyen_follow(User $user,Truyen $truyen ) {
        $user = Auth::user();
        $danhmuc = Danhmuc::OrderBy('id', 'DESC')->get();
        $theloai = Theloai::orderBy('id', 'ASC')->get();
        $category = Category::all();
        $categories = $this->category->all();
        $userStories = $user->favorite_comic()->orderBy('id','DESC')->paginate(10);
        $count_user_stories  = $userStories->total();
        return view('page.user.user_profile.favorite_truyens',compact('danhmuc','theloai','categories','user','userStories','truyen','count_user_stories'));

    }       
}
