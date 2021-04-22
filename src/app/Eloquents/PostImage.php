<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';

    protected $fillable = [
        'category','title','subtitle','web_page','user_id','public_id','image_path',
        'hour','difficult','step',
        'descriptionA','descriptionB','descriptionC','descriptionD','descriptionE',
        'materialA','materialB','materialC','materialD',
        'materialE','materialF','materialG',
        'maAnum','maBnum','maCnum','maDnum','maEnum','maFnum','maGnum',
        'goodsA','goodsB','goodsC','goodsD','goodsE',

    ];

    
    public function user()
    {
        return $this->hasOne(\App\Eloquents\User::class,'id','user_id');
    }

    // public function recipe()
    // {
    //     return $this->hasOne(\App\Eloquents\Recipe::class,'post_id','id');
    // }

    public function favorite()
    {
           return $this->hasMany(\App\Eloquents\Favorite::class,'post_id','id');
    }

   
}
