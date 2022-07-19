<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Truyen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request){
      $role = Auth::user()->role;
      if($role=='1'){
          $validator = Validator::make($request->all(),[
              'comment_body' =>'required|string',
          ]);
          if($validator->fails()){
            return redirect()->back()->with('failed','Bạn phải nhập nội dung');
          }
          $truyen  = Truyen::where('slug_truyen',$request->slug_truyen)->first();
          if($truyen){
            Comment::create([
                'truyen_id'=>$request->input('truyen_id'),
                'user_id'=>Auth::user()->id,
                'comment_body' =>$request->input('comment_body'),
                'created_at'=> $request->created_at= new Carbon('Asia/Ho_Chi_Minh'),
                'updated_at'=> $request->updated_at= Carbon::now('Asia/Ho_Chi_Minh'),


            ]);
            // $model  = new Comment();
            // $model->truyen_id = $request->input('truyen_id');
            // $model->user_id = Auth::user()->id;
            // $model->comment_body = $request->input('comment_body');
            // $model->save();
            // return redirect()->back();
            return redirect()->back();

          }else{
            return redirect()->back()->with('failed','không tìm thấy truyện');
          }
      }else{
          return redirect()->back()->with('failed','bạn cần đăng nhập để bình luận');
      }
    }
}
