<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Category;
use App\Models\CategoryTruyen;
use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    private $truyen;
    private $chapter;
    private $category;
    private $categoryTruyen;
    private $favorite;
    public function __construct(Truyen $truyen, Chapter $chapter, Category $category, CategoryTruyen $categoryTruyen)
    {
        $this->truyen = $truyen;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->categoryTruyen = $categoryTruyen;
        // $this->middleware('auth');
    }
    public function index()
    {
        if (auth::check()) {
            $user = Auth::user();

            $danhmuc = Danhmuc::OrderBy('id', 'DESC')->get();

            $theloai = Theloai::orderBy('id', 'ASC')->get();

            $categories = $this->category->all();

            $userStories = $user->favorite_comic()->orderBy('id', 'DESC')->limit(5)->get();

            return view('page.user.user_profile.truyen_follow', compact('theloai', 'danhmuc', 'categories','user','userStories'));

        } else {

            return redirect(route('dang-nhap'))->with('failed', 'bạn cần đăng nhập');
        }
    }
    public function edit()
    {
        if (auth::check()) {

            $user = Auth::user();

            $danhmuc = Danhmuc::OrderBy('id', 'DESC')->get();

            $theloai = Theloai::orderBy('id', 'ASC')->get();

            $categories = $this->category->all();

            return view('page.user.user_profile.update_profile', compact('theloai', 'danhmuc', 'categories'));

        } else {

            return redirect(route('dang-nhap'))->with('failed', 'bạn cần đăng nhập');
        }
    }
    public function update(Request $request)
    {
        if (auth::check()) {
            $user = Auth::user();
            $user->full_name = $request->full_name;
            if ($request->hasFile('image')) {
                $filename = uniqid() . '-' . $request->image->getClientOriginalName();
                $this->deleteOldImage();
                $path = $request->image->storeAs('user_image', $filename, 'public');
                Auth::user()->image = str_replace('public/', '', $path);
                Auth::user()->update(['image' => $filename]);
            }
            // dd($user);
            $user->save();

            return redirect()->back()->with('success', 'thay đổi thông tin thành công');

        } else {

            return redirect(route('dang-nhap'))->with('failed', 'bạn cần đăng nhập');
        }
    }
    protected function deleteOldImage()
    {
        if (auth()->user()->image) {
            Storage::delete('/public/user_image/' . auth()->user()->image);
        }
    }
    protected function change_password_index(){
        if (auth::check()) {
        $user = Auth::user();

        $danhmuc = Danhmuc::OrderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'ASC')->get();

        $categories = $this->category->all();

        return view('page.user.user_profile.change_password', compact('theloai', 'danhmuc', 'categories'));

        }else {

            return redirect(route('dang-nhap'))->with('failed', 'bạn cần đăng nhập');
        }
    }
    public function changePassword(Request $request)
    {
        
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("failed","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("failed","New Password cannot be same as your current password. Please choose a different password.");
        }
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    
    public function remove($truyen){
        $user = Auth::user();
        $user->favorite_comic()->detach($truyen); 
        return redirect()->back()->with('success','Xoá truyện yêu thích thành công');
    }  
}
