<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Api\PostImage;
use App\Eloquents\PostImage;
use App\Eloquents\Recipe;
use JD\Cloudder\Facades\Cloudder;

class PostImageController extends Controller
{
    
    // public function store(PostImage $request)
    public function store(Request $request)
    {
        // dd($request);
        $newImage = \DB::transaction(function() use ($request){
            // dd($request->user());
          
            $Upload = new PostImage();
            $img = $request->file('image_path')->getRealPath();
            // $img = $request->file();
            // dd($img);
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
                'subtitle' => $request->input('subtitle'),
                'web_page' => $request->input('web_page'),
                'difficult' => $request->input('difficult'),
                'step' => $request->input('step'),
                'hour' => $request->input('hour'),
                'image_path' => $logoUrl,
                'public_id' => $publicId,
                'descriptionA' => $request->input('descriptionA'),
                'descriptionB' => $request->input('descriptionB'),
                'descriptionC' => $request->input('descriptionC'),
                'descriptionD' => $request->input('descriptionD'),
                'descriptionE' => $request->input('descriptionE'),
                'materialA' => $request->input('materialA'),
                'materialB' => $request->input('materialB'),
                'materialC' => $request->input('materialC'),
                'materialD' => $request->input('materialD'),
                'materialE' => $request->input('materialE'),
                'materialF' => $request->input('materialF'),
                'materialG' => $request->input('materialG'),
                'maAnum' => $request->input('maAnum'),
                'maBnum' => $request->input('maBnum'),
                'maCnum' => $request->input('maCnum'),
                'maDnum' => $request->input('maDnum'),
                'maEnum' => $request->input('maEnum'),
                'maFnum' => $request->input('maFnum'),
                'maGnum' => $request->input('maGnum'),
                'goodsA' => $request->input('goodsA'),
                'goodsB' => $request->input('goodsB'),
                'goodsC' => $request->input('goodsC'),
                'goodsD' => $request->input('goodsD'),
                'goodsE' => $request->input('goodsE'),
            ]);
            return $Upload;
            });
            return response()->json($newImage); 
    }
   
    // // 自分の投稿一覧 myPage
    // public function show(Request $request)
    // {
    //     // dd($request);
    //     // $myId = $request->user()->id;
    //     $myId = 1;
    //     // $showImage = PostImage::find($myId);
    //     // $showImage = PostImage::with(['favorite'])
    //                 // ->where('user_id',$myId)
    //                 // ->get()
    //                 // ->toArray();
        

    //     // dd($showImage);
    //     // return response()->json($showImage);
    //     // return new \App\Http\Resources\PostImageCollection($showImage);
    // }
    
 
    // 投稿一覧 
    public function showall(Request $request)
    {
        // dd($request->user()->id);
        // $myId = $request->user()->id;
        // $showImage = PostImage::all();
        
        $showImage = PostImage::with(['favorite','user'])
                                ->get();
        // $showImage = PostImage::all();
        
        // dd($showImage);
            // dd($showImage);
        return response()->json($showImage);
        // return new \App\Http\Resources\PostImageCollection($showImage);

    }


     
    // 投稿個別ページ
    public function showId(Request $request,int $id)
    {
       
        // $post = PostImage::find($id);
        $post = PostImage::with(['favorite','user'])
                        ->where('id',$id)
                        ->get();
                      
        // dd($id);
        return response()->json($post);

    }

     
    // カテゴリ別ページ
    public function showCategory(Request $request, $category)
    {

        // dd($category);
        $category_post = PostImage::with(['favorite','user'])
                                    ->where('category',$category)
                                    ->get();
        // dd($category_post);
        return response()->json($category_post);
        // return new \App\Http\Resources\PostImageCollection($showImage);

    }


     
    // 自分の投稿一覧 myPage
    public function showtestId(Request $request,int $id)
    {

        // $post = PostImage::find($id);
        $post = PostImage::with(['favorite','user'])
                            ->where('id',$id)
                            ->get();
        // dd($id);
        return response()->json($post);
        // return new \App\Http\Resources\PostImageCollection($showImage);

    }



}
