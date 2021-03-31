<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id','post_id'
    ];

    public function post()
    {
        return $this->belongsTo(PostImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
}
