<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
use App\Http\Requests\TruyenRequest;
use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\Category;
use App\Models\CategoryTruyen;
use App\Models\Chapter_image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TruyenController extends Controller
{
    private $truyen;
    private $chapter;
    private $category;
    private $categoryTruyen;
    public function __construct(Truyen $truyen,Chapter $chapter, Category $category, CategoryTruyen $categoryTruyen){
        $this->truyen = $truyen;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->categoryTruyen = $categoryTruyen;
    }
    public function index(){
        if(Auth::check()){
            $role = Auth::user()->role;
        if($role=='1'){
            $truyen = Truyen::orderBy('id','DESC')->paginate(10);
            return view('BackEnd.Truyen.index',compact('truyen'));
        }elseif($role=='2'){
            $truyen = Truyen::with('user')->where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(10);
                return view('BackEnd.Truyen.index',compact('truyen'));
                
        }else{
            return redirect(route('trang-chu'));
            }
        }
    }
    public function create(){
        $theloai =  Theloai::all();
        $danhmuc = Danhmuc::all();
        $categories = $this->category->all();
        return view('BackEnd.Truyen.Create',compact('danhmuc','theloai','categories'));
    }
    public function store(TruyenRequest $request){
        $data = [
            'tieu_de'   => $request->tieu_de,
            'slug_truyen' => $request->slug_truyen,
            'tac_gia'   => $request->tac_gia,
            'mo_ta_ngan'=> $request->mo_ta_ngan,
            'trang_thai'=> $request->trang_thai,
            'tinh_trang' => $request->tinh_trang,
            'theloai_id' => $request->theloai_id,
            'user_id' => Auth::user()->id,
            'created_at'=> $request->created_at= Carbon::now('Asia/Ho_Chi_Minh'),
        ];
        if($request->hasFile('image')){
            $newFileName = uniqid().'-'.$request->image->getClientOriginalName();
            $path=$request->image->storeAs('public/uploads/truyen',$newFileName);
            $data['image'] = str_replace('public/','',$path);
        }
        
        if(!is_null($request->image)) {
            $truyenstore = $this->truyen->create($data);
            $truyenstore->category_truyen()->attach($request->category_id);
            return redirect(route('truyen.index'))->with('success','Success! image uploaded');
        }

        else {
            return redirect(route('truyen.index'))->with("failed", "Alert! image not uploaded");
        }
        
    }
    public function delete($id){
        $truyen = Truyen::findOrFail($id);
        if(!$truyen){
            return redirect()->back()->with('status','không tìm thấy dữ liệu!');
            
        }
        $truyen->category_truyen()->detach();
        $truyen->chapter()->delete();
        $truyen->destroy($id);
        $truyen->save();
        return redirect()->back()->with('success','xoá thành công');
    }
    public function edit($id){
        $truyen = Truyen::findOrFail($id);
        $theloai =  Theloai::all();
        $danhmuc = Danhmuc::all();
        $categories = $this->category->all();

        if(!$truyen){
            return redirect()->back()->with('status','không tìm thấy dữ liệu!');
        }
        $categoryCheck = $truyen->category_truyen;
        return view('BackEnd.Truyen.edit',compact('truyen','danhmuc','theloai','categories','categoryCheck'));
    }
    public function update($id,Request $request){
        $truyen = Truyen::findOrFail($id);
        if(!$truyen){
            return redirect()->back()->with('status','không tìm thấy dữ liệu!');
        }
        $truyen->update($request->all());
        if($request->hasFile('image')){
            $newFileName = uniqid().'-'.$request->image->getClientOriginalName();
            $path=$request->image->storeAs('public/uploads/truyen',$newFileName);
            $truyen->image=str_replace('public/','',$path);
        }
        $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

       
        $truyen->category_truyen()->sync($request->category_id);
        
        return redirect(route('truyen.index'))->with('status','sửa thành công');
    }
    public function show($slug){
        $truyen= $this->truyen->where('slug_truyen',$slug)->first();
        $chapters=$truyen->chapter()->paginate(5);
        return view('BackEnd.Truyen.Chapter.index',compact('chapters','truyen'));
    }
    public function create_form_chapter($slug){
        $truyen = $this->truyen->where('slug_truyen',$slug)->first();
        return view('BackEnd.Truyen.Chapter.create',compact('truyen','slug'));
    }
    public function save_chapter($slug,ChapterRequest $request){
        
        $data = [
            'chapter_name'=>$request->chapter_name,
            'chapter_number'=>$request->chapter_number,
            'slug_chapter'=>$request->slug_chapter,
            'status'=>$request->status,
            'truyen_id'=>$request->truyen_id,
            'created_at'=>$request->created_at = Carbon::now(),
        ];
        $model = $this->truyen->where('slug_truyen',$slug)->first();
        $model = Chapter::create($data);
        if($request->hasFile('chapter_images')){
            foreach($request->file('chapter_images') as $image){
                $newFileName = uniqid().'-'.$image->getClientOriginalName();
                $path=$image->storeAs('public/upload/chapter/',$newFileName);
                $image=str_replace('public/','',$path);
                Chapter_image::create([
                    'chapters_id'=>$model->id,
                    'image'=>$newFileName
                ]);
            }
        }
        if(!$model){
            return redirect()->back()->with('failed','Không thêm được chapter !');
        }
        return redirect()->back()->with('success','Thêm chapter thành công!');
    }
    public function delete_chapter($slug,$slug_chapter){
        $truyen = $this->truyen->where('slug_truyen',$slug)->first();
        $chapters = $truyen->chapter()->where('slug_chapter',$slug_chapter)->delete();
        if(!$chapters){
            return redirect()->back()->with('failed','không tìm thấy dữ liệu!');
        }
        return redirect()->back()->with('success','xoá thành công');
    }
    public function edit_chapter($slug,$slug_chapter){
        $truyen = $this->truyen->where('slug_truyen',$slug)->first();
        $chapters = $truyen->chapter()->where('slug_chapter',$slug_chapter)->first();
        return view('BackEnd.Truyen.Chapter.edit',compact('truyen','chapters'));
    }
    public function show_image_chapter($slug,$slug_chapter){
        $truyen = $this->truyen->where('slug_truyen',$slug)->first();
        $chapter = $truyen->chapter()->where('slug_chapter',$slug_chapter)->first();
        if(!$chapter) abort(404);
        $images=$chapter->chapter_images;
        return view('BackEnd.Truyen.Chapter.image',compact('chapter','images','truyen','slug','slug_chapter'));
    }
    public function update_chapter($slug,$slug_chapter,ChapterRequest $request){
        $truyen = $this->truyen->where('slug_truyen',$slug)->first();
        $chapters = $truyen->chapter()->where('slug_chapter',$slug_chapter)->first();
        if(!$chapters){
            return view('BackEnd.Truyen.Chapter.edit',compact('truyen'));
        }
        $chapters->tieu_de = $request->tieu_de;
        $chapters->noi_dung = $request->noi_dung;
        $chapters->trang_thai = $request->trang_thai;
        $chapters->slug_chapter = $request->slug_chapter;
        $chapters->save();
        return redirect(route('chapter.show',$slug,$slug_chapter))->with('success','Sửa thành công');
        

    }

}
