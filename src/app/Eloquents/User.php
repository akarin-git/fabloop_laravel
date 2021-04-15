<?php

namespace App\Eloquents;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

// class User extends Model
class User extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'users';

       protected $fillable = [
           'name','email','password','role'
       ];
       protected $hidden = [
                'password', 'remember_token',
            ];

            
       public function post_image()
            {
                return $this->hasMany(\App\Eloquents\PostImage::class,'user_id','id');
            }
       public function favorite()
            {
                return $this->hasMany(\App\Eloquents\Favorite::class,'user_id','id');
            }
}
