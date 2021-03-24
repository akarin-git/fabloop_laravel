<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = [
        'post_id',
        'material_one','material_twe','material_three','material_four',
        'material_five','material_six','material_seven',
        'amount_one','amount_twe','amount_three','amount_four',
        'amount_five','amount_six','amount_seven',
        'goods_one','goods_twe','goods_three','goods_four','goods_five',
    ];

    public function post_image()
    {
        return $this->hasOne(\App\Eloquents\PostImage::class,'id','post_id');
    }
}
