<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\User;

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
        
        // $myInfo = User::find($myId);
        $myInfo = User::with(['favorite','post_image'])
                            ->where('id',$myId)
                            ->get();
      
        return response()->json([$myInfo]);
    }


   public function usershow(Request $request,int $userId)
    {
       
        $userInfo = User::with(['favorite','post_image'])
                        ->where('id',$userId)
                        ->get();
       
        
        return response()->json([$userInfo]);
    }
}
