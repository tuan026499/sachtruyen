<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable =  [ 'cate_name','slug_cate','mo_ta'];
    
    public function truyen()
    {
        return $this->belongsToMany(Truyen::class,'category_truyens','id_category','id_truyen');
    }
}
