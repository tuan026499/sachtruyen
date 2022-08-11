<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTruyen;
use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Theloai;
use App\Models\Truyen;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $truyen;
    private $chapter;
    private $danhmuc;
    private $theloai;
    private $category;
    private $categoryTruyen;
    private $favorite;
    public function __construct(Truyen $truyen, Chapter $chapter, Category $category, CategoryTruyen $categoryTruyen,Danhmuc $danhmuc,Theloai $theloai)
    {
        $this->truyen = $truyen;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->categoryTruyen = $categoryTruyen;
        $this->theloai = $danhmuc;
        $this->theloai = $theloai;
    }
    public function index()
    { 
        $user = Auth::user();
        $theloai = Theloai::OrderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::OrderBy('id', 'DESC')->get();
        $truyen = Truyen::OrderBy('id', 'DESC')->where('trang_thai', 1)->paginate(30);
        $category = Category::all();
        $categories = $this->category->all();
        return view('index', compact('theloai', 'danhmuc', 'truyen','categories','user','category'));
    }
    public function xemtruyen($slug)
    {
        $theloai = Theloai::all();
        $danhmuc  = Danhmuc::all();
        $category = Category::all();
        $categories = $this->category->all();
        $truyen = Truyen::with('danhmuc', 'theloai')->where('slug_truyen', $slug)->where('trang_thai', 1)->first();
        $chapter = $truyen->chapter()->OrderBy('id', 'DESC')->get();
        $categoryCheck = $truyen->category_truyen;
        return view('page.detail_truyen', compact('theloai', 'danhmuc', 'category', 'truyen', 'categories', 'categoryCheck', 'chapter'));
    }
    public function doc_chapter($slug, $slug_chapter)
    {
        $theloai = Theloai::all();
        $danhmuc  = Danhmuc::all();
        $category = Category::all();
        $categories = $this->category->all();
        $truyen = $this->truyen->where('slug_truyen', $slug)->first();
        $chapter = $truyen->chapter()->where('slug_chapter', $slug_chapter)->first();
        $images = $chapter->chapter_images;
        $all_chapter = $truyen->chapter()->orderBy('id','ASC')->get();
        $min_id =$truyen->chapter()->orderBy('id','ASC')->first();
        $max_id =$truyen->chapter()->orderBy('id','DESC')->first();
        $next_chapter = $truyen->chapter()->where('id','>',$chapter->id)->orderBy('id','asc')->first();
        $previous_chapter = $truyen->chapter()->where('id','<',$chapter->id)->orderBy('id','desc')->first();
        $checkChapterId = $chapter->id;
        
        return view('page.detail_chapter', compact('danhmuc','chapter','category','truyen','all_chapter',
        'previous_chapter','next_chapter','max_id','min_id','theloai','slug','slug_chapter','checkChapterId','categories','images'));
    }
    public function show_cate(){
        $danhmuc = Danhmuc::all();
        $categories = $this->category->all();
        return view('page.detail_category',compact('categories','danhmuc'));
    }
    public function detail_cate($slug){
        $danhmuc = Danhmuc::all();
        $categories = $this->category->where('slug_cate',$slug)->get();
        $truyen = $categories[0]->truyen;
        $count=$truyen->count();
        return view('page.cate_with_truyen',compact('categories','danhmuc','truyen','count'));


    }
}
