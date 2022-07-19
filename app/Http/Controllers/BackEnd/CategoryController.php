<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{      
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){
        if(Auth::check()){
            $category = $this->category->all();
            return view('BackEnd.Category.index',compact('category'));
        }else{
            return view('BackEnd.Truyen.index',compact('truyen'));
        }
    }
    public function create(){
        // $model = new Category();
        // $model->fill($request->all());
        // $model->save();
        return view('BackEnd.Category.create');
    }
    public function store(CategoryAddRequest $request)
    {
        $data = [
            'cate_name' => $request->cate_name,
            'slug_cate' => $request->slug_cate,
            'mo_ta' => $request->mo_ta,
        ];
        $create = $this->category->create($data);
        if($create){
            return redirect()->route('category.index');
        }else{
            return redirect()->route('category.create');
        }
    }
    public function delete($slug){
        $category = $this->category->where('slug_cate',$slug)->delete();
        if(!$category){
            return redirect()->back()->with('success',' cannot find that category ');
        }else{
            return redirect()->back()->with('failed',' that category has been deleted');
        }
        
    }
}
