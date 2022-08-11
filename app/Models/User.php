<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'full_name',
        'image',
        'role'
    ];
    public function truyen(){
        return $this->hasMany(Truyen::class,'user_id','id');
    }
    // public function truyen()
    // {
    //     return $this->belongsToMany(Truyen::class,'favorite_comic','id_truyen','id_user');
    // }
    public function chapter(){
        return $this->hasMany(Chapter::class,'truyen_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','id');
    }
    public function favorite_comic(){
        return $this->belongsToMany(Truyen::class,'favorite_comic','user_id','truyen_id')->withTimestamps();
    }
    public function role_user(){
        return $this->belongsToMany(Role::class,'role_user','role_id','user_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
