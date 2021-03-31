<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';

    protected $fillable = [
        'image_path','category','title','description','web_page','user_id','public_id'
    ];

    
    public function user()
    {
        return $this->hasOne(\App\Eloquents\User::class,'id','user_id');
    }

    public function recipe()
    {
        return $this->hasOne(\App\Eloquents\Recipe::class,'post_id','id');
    }

    public function favorite()
    {
           return $this->hasMany(\App\Eloquents\Favorite::class,'post_id','id');
    }

   
}
