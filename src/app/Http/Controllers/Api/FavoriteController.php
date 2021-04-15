<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\Favorite;

class FavoriteController extends Controller
{

    protected $favorite;

    public function __construct(
        Favorite $favorite
    ) {
        $this->favorite = $favorite;
    }

    // 自分のお気に入りget
    public function myfavorite(Request $request)
    {
        $myId = $request->user()->id;
        // dd($myId);

        $myfavoritelist = Favorite::where('user_id',$myId)->get();

        // dd($myfavoritelist);
        return response()->json($myfavoritelist);
    }

    // お気に入り登録
    public function store(Request $request)
    {
        // dd($request);
        $myId = $request->user()->id;
        $post_id = $request->input('post_id');
        
        // Favorite::where('user_id',$myId)->delete();

        $myfavorite = new Favorite();
        $myfavorite->fill([
            'user_id' => $myId,
            'post_id' => $post_id,
        ]);
        $myfavorite->save();

        return response()->json($myfavorite); 
    }

    // お気に入り削除
    public function delete(Request $request)
  {
    $myId = $request->user()->id;
        
        Favorite::where('user_id',$myId)->delete();

    return response()->json($favorite);
  }
}
