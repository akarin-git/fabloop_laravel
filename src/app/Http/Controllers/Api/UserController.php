<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\User;
use App\Eloquents\PostImage;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{

    // user一覧 
    public function userall(Request $request)
    {
        // dd($request);
        // $myId = $request->user()->id;
        // $showImage = PostImage::all();
        
        // $userall = User::all();
        $userall = User::with(['favorite','post_image'])
                                ->get();
        // $showImage = PostImage::all();
        
        // dd($userall);
          
        return response()->json($userall);
        // return new \App\Http\Resources\PostImageCollection($showImage);

    }

    public function me(Request $request)
    {
        $myId = $request->user()->id;
        
        $myFabPostId = DB::table('favorites')
                        ->where('user_id',$myId)
                        ->value('post_id');
        //    $myfavorite = DB::table('post_images')->where('id',$myId)->get();
        
        // $fab = $myInfo->where('favorite')
        // ->where('post_image','id')
        // ->get();
        $fabpost = DB::table('post_images')
                    ->where('id',$myFabPostId)
                    ->get();
        
        $myInfo = User::with(['post_image','favorite'])
                    ->where('id',$myId)
                    ->get();
        // dd($myInfo);
        // $myInfo = User::find($myId);
        return response()->json($myInfo);
    }


   public function usershow(Request $request,int $userId)
    {
       
        $userInfo = User::with(['favorite','post_image'])
                        ->where('id',$userId)
                        ->get();
       
        
        return response()->json($userInfo);
    }
}
