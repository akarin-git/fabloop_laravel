<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\User;

class UserController extends Controller
{
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
        // dd($userId);
        //  $userInfo = User::find($userId);
        $userInfo = User::with(['favorite','post_image'])
                        ->where('id',$userId)
                        ->get();
       
        
        return response()->json([$userInfo]);
    }
}
