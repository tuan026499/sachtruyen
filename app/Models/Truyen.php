<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
class Truyen extends Model
{
    use HasFactory;
    protected $table='truyen';
    public $timestamps = true;
    protected $fillable = ['tieu_de','image','mo_ta_ngan','trang_thai','tac_gia','tinh_trang','slug_truyen','theloai_id','user_id','created_at'];
    protected $primaryKey = 'id';
    public function danhmuc(){
        return $this->belongsTo(Danhmuc::class,'danh_muc_id','id');
    }
    public function chapter(){
        return $this->hasMany(Chapter::class,'truyen_id','id');
    }
    public function theloai(){
        return $this->belongsTo(Theloai::class,'theloai_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category_truyen()
    {
        return $this->belongsToMany(Category::class,'category_truyens','id_truyen','id_category');
        // thằng truyện liên kết qua category qua bảng category_truyens 
        // với 2 field là id_truyen (thuộc bảng truyen) và id_category thuộc bảng category
    }
    public function comments(){
        return $this->hasMany(Comment::class,'truyen_id','id');
    }
    public function favorite_comic(){
        return $this->belongsToMany(User::class,'favorite_comic','truyen_id','user_id')->withTimestamps();
    }
}
