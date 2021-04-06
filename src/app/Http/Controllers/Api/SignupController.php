<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\User;

class SignupController extends Controller
{
    public function userSignup(Request $request)
    {
        $role = 1;
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');

        $stored = \App\Eloquents\User::create([
            'role' => $role,
            'email' => $email,
            'password' => bcrypt($password),
            'name' => $name,
        ]);

        return response()->json([$stored]);
   }
    public function shopSignup(Request $request)
    {
        $role = 2;
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');

        $stored = \App\Eloquents\User::create([
            'role' => $role,
            'email' => $email,
            'password' => bcrypt($password),
            'name' => $name,
        ]);

        return response()->json([$stored]);
   }

   public function me(Request $request)
    {
        $myId = $request->user()->id;
        
        $myInfo = User::find($myId);
        // $myInfo = User::with(['favorite'])->find($myId);
        // dd($myInfo);

       // とりあえず、そのままレスポンスします（後ほど整形します）
        // return response()->json($myInfo);
        return response()->json([$myInfo]);
    }
}

