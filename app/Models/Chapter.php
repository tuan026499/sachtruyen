<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = 'chapter';
    // protected $fillable = ['truyen_id','chapter_name','chapter_number','status','slug_chapter','created_at'];
    // protected $primaryKey = 'id';
    public function truyen(){
        return $this->belongsTo(Truyen::class);
    }
    public function chapter_images(){
        return $this->hasMany(Chapter_image::class,'chapters_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug_chapter';
    }
    public function next(){
        // get next user
        return Chapter::where('id', '<', $this->id)->orderBy('id','desc')->first();
    
    }
    public  function previous(){
        // get previous  user
        
        return Chapter::where('id', '>', $this->id)->orderBy('id','asc')->first();
    
    }
}
