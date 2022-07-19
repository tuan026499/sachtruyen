<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['truyen_id','user_id','comment_body','created_at','updated_at'];
    
    public function truyen(){
        return $this->belongsTo(Truyen::class,'truyen_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
