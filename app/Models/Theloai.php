<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;
    protected $table = 'theloai';
    protected $fillable = ['ten_the_loai','mo_ta','slug_the_loai','trang_thai'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function truyen(){
        return $this->hasMany(Truyen::class);
    }
}
