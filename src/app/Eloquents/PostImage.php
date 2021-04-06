<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';

    protected $fillable = [
        'image_path','category','title','descriptionA','descriptionB','descriptionC','web_page','user_id','public_id',
        'materialA','materialB','materialC','materialD',
        'materialE','materialF','materialG',
        'amountA','amountB','amountC','amountD',
        'amountE','amountF','amountG',
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
