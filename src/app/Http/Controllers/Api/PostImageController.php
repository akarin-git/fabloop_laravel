<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquents\PostImage;
use App\Eloquents\Recipe;
use JD\Cloudder\Facades\Cloudder;

class PostImageController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->file('image_path')->getRealPath());
        $newImage = \DB::transaction(function() use ($request){
            // dd($request->user());
          
            // dd($myId);
            $Upload = new PostImage();
            $img = $request->file('image')->getRealPath();
            // cloudinaryにアップロードされた画像の名前を取得
                Cloudder::upload($img,null);
            // cloudinaryにアップロードされた画像の名前を取得
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId,[
                // 保存の際の画像の幅と高さを指定
                'width' => 400,
                'height' => 300,
                ]);
                
            $Upload = \App\Eloquents\PostImage::create([
                'user_id' => $request->user()->id,
                'category' => $request->input('category'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'web_page' => $request->input('web_page'),
                'image_path' => $logoUrl,
                'public_id' => $publicId,
            ]);
            // dd($Upload);
                
            $recipe = new Recipe();
            $postId = $Upload->id;
            $recipe = \App\Eloquents\Recipe::create([
                'post_id' => $postId,
                'material_one' => $request->input('material_one'),
                'material_twe' => $request->input('material_twe'),
                'material_three' => $request->input('material_three'),
                'amount_one' => $request->input('amount_one'),
                'amount_twe' => $request->input('amount_twe'),
                'amount_three' => $request->input('amount_three'),
                'goods_one' => $request->input('goods_one'),
                'goods_twe' => $request->input('goods_twe'),
                'goods_three' => $request->input('goods_three'),
            ]);
                    return [$Upload,$recipe];
            });
            return response()->json($newImage); 
    // とりあえず、そのままレスポンスします（後ほど整形します）
    }


    // 自分の投稿一覧 myPage
    public function show(Request $request)
    {
        $myId = $request->user()->id;
        // dd($request);
        // $showImage = PostImage::all();
        $showImage = PostImage::with(['recipe'])
                    ->where('user_id',$myId)
                    ->get()
                    ->toArray();

            // dd($showImage);
        return response()->json($showImage);
    }


    // 投稿個別ページ
    public function showId(Request $request,int $id)
    {

        $post = PostImage::find($id);
        // dd($id);
        return response()->json($post);
    }



    // 自分の投稿一覧 myPage
    public function showtest(Request $request)
    {
        // $myId = $request->user()->id;
        // $showImage = PostImage::all();
        $showImage = PostImage::all();
        
        // dd($showImage);
            // dd($showImage);
        return response()->json($showImage);
    }


    // 自分の投稿一覧 myPage
    public function showtestId(Request $request,int $id)
    {

        $post = PostImage::find($id);
        // dd($id);
        return response()->json($post);
    }
}
