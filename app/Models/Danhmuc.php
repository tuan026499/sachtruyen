<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    protected $fillable = [
        'ten_danh_muc', 'mo_ta', 'trang_thai', 'slug_danh_muc'
    ];
    public function truyen()
    {
        return $this->hasMany(Truyen::class);
    }
}
